<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamFormRequest;
use App\Models\GroupModel;
use App\Models\TeamModel;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function __construct(TeamRepository $teamRepository, GroupRepository $groupRepository, TeamModel $team)
    {
        $this->teamRepository = $teamRepository;
        $this->groupRepository = $groupRepository;
        $this->team = $team;
    }
    public function index(Request $request)
    {
        if ($request->sort_field != '' && $request->sort_type != '') {
            if ($request->sort_type == 'desc') {
                $teams = TeamModel::orderByDesc($request->sort_field)->paginate(LIMIT_PER_PAGE);
            } else if ($request->sort_type == 'asc') {
                $teams = TeamModel::orderBy($request->sort_field)->paginate(LIMIT_PER_PAGE);
            }
        } else if ($request->sort_field == null && $request->sort_type == null) {
            $teams = TeamModel::paginate(LIMIT_PER_PAGE);
        }
        $groups = GroupModel::all();
        return view('team.index', compact('teams', 'groups'));
    }

    public function getAdd(Request $request)
    {
        $groups = GroupModel::all();
        return view('team.add', compact('groups'));
    }
    public function getAddConfirm(Request $request)
    {
        $groups = GroupModel::all();
        return view('team.editConfirm', compact('groups'));
    }
    public function postAdd(TeamFormRequest $request)
    {
        $request->all();
        return redirect()->route('team.getAddConfirm')->withInput();
    }
    public function postAddConfirm(Request $request)
    {
        $data = $request->all();
        $this->teamRepository->create($data);
        return redirect()->route('team.index')->with('message', 'You have created an account successfully');
    }
    public function getEdit(Request $request)
    {
        $id = $request->id;
        $team = $this->teamRepository->find($id);
        $groups = GroupModel::all();
        return view('team.edit', compact('team', 'groups'));
    }
    public function getEditConfirm(Request $request)
    {
        $groups = GroupModel::all();
        return view('team.editConfirm', compact('groups'));
    }
    public function postEdit(TeamFormRequest $request)
    {
        $request->all;
        return redirect()->route('team.getEditConfirm', ['id' => $request->id])->withInput();
    }
    public function postEditConfirm(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $this->teamRepository->update($id, $data);
        return redirect()->route('team.index')->with('message', 'You have updated the account successfully');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $data['del_flag'] = DEL_FLAG_BANNED;
        DB::beginTransaction();
        try {
            $this->employeeRepository->deleteEmployeebyTeamId($id, $data);
            $this->teamRepository->delete($id, $data);    
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return redirect()->route('team.index')->with('message', 'You have delete the employee successfully');
    }
    public function getSearch(Request $request, Builder $query)
    {
        $groups = GroupModel::all();
        $group_id = $request->group_id;
        $search = $request->search;
        $query = $this->teamRepository->findByField($search);
        if ($group_id > 0) {
            $query->groupId($group_id)->paginate(LIMIT_PER_PAGE);
        }
        if ($request->sort_field != '' && $request->sort_type != '') {
            if ($request->sort_type == 'desc') {
                $teams = $query->orderByDesc($request->sort_field)->paginate(LIMIT_PER_PAGE);
            } else if ($request->sort_type == 'asc') {
                $teams = $query->orderBy($request->sort_field)->paginate(LIMIT_PER_PAGE);
            }
        } else if ($request->sort_field == null && $request->sort_type == null) {
            $teams = $query->paginate(LIMIT_PER_PAGE);
        }

        return view('team.index', compact('teams', 'groups'));
    }
}
