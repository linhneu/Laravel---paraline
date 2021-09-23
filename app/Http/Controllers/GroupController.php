<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupFormRequest;
use App\Models\GroupModel;
use App\Models\TeamModel;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use App\Repositories\GroupRepository;
use App\Repositories\TeamRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function __construct(GroupRepository $groupRepository, TeamRepository $teamRepository, EmployeeRepository $employeeRepository)
    {
        $this->groupRepository = $groupRepository;
        $this->teamRepository = $teamRepository;
        $this->employeeRepository = $employeeRepository;
    }
    public function index(Request $request)
    {
        if ($request->sort_field != '' && $request->sort_type != '') {
            if ($request->sort_type == 'desc') {
                $groups = GroupModel::orderByDesc($request->sort_field)->paginate(LIMIT_PER_PAGE);
            } else if ($request->sort_type == 'asc') {
                $groups = GroupModel::orderBy($request->sort_field)->paginate(LIMIT_PER_PAGE);
            }
        } else if ($request->sort_field == null && $request->sort_type == null) {
            $groups = GroupModel::paginate(LIMIT_PER_PAGE);
        }
        return view('group.index', compact('groups'));
    }

    public function getAdd()
    {
        return view('group.add');
    }
    public function getAddConfirm()
    {
        return view('group.addConfirm');
    }
    public function postAdd(GroupFormRequest $request)
    {
        $request->all();
        return redirect()->route('group.getAddConfirm')->withInput();
    }
    public function postAddConfirm(GroupFormRequest $request)
    {
        $data = $request->all();
        $this->groupRepository->create($data);
        return redirect()->route('group.index')->with('message', 'You have created a group successfully');
    }
    public function getEdit(Request $request)
    {
        $id = $request->id;
        $group = $this->groupRepository->find($id);
        return view('group.edit', compact('group'));
    }
    public function getEditConfirm()
    {
        return view('group.editConfirm');
    }
    public function postEdit(GroupFormRequest $request)
    {
        $request->all;
        return redirect()->route('group.getEditConfirm', ['id' => $request->id])->withInput();
    }
    public function postEditConfirm(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $this->groupRepository->update($id, $data);
        return redirect()->route('group.index')->with('message', 'You have updated the group successfully');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $data['del_flag'] = DEL_FLAG_BANNED;
        $team_id = TeamModel::groupId($id)->pluck('id');
        DB::beginTransaction();
        try {
            $this->employeeRepository->deleteEmployeeByTeamId($team_id, $data);
            $this->teamRepository->deleteTeamByGroupId($id, $data);
            $this->groupRepository->delete($id, $data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return redirect()->route('group.index')->with('message', 'You have delete the group successfully');
    }

    public function getSearch(Request $request)
    {
        $search = $request->search;
        if ($request->sort_field != '' && $request->sort_type != '') {
            if ($request->sort_type == 'desc') {
                $groups = $this->groupRepository->findByField($search)->orderByDesc($request->sort_field)->paginate(3);
            } else if ($request->sort_type == 'asc') {
                $groups = $this->groupRepository->findByField($search)->orderBy($request->sort_field)->paginate(3);
            }
        } else if ($request->sort_field == null && $request->sort_type == null) {
            $groups = $this->groupRepository->findByField($search)->paginate(3);
        }
        return view('group.index', compact('groups'));
    }
}
