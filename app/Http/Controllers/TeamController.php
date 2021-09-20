<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamFormRequest;
use App\Models\TeamModel;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use Illuminate\Database\Eloquent\Builder;

class TeamController extends Controller
{
    public function __construct(TeamRepository $teamRepository, GroupRepository $groupRepository, TeamModel $team)
    {
        $this->teamRepository = $teamRepository;
        $this->groupRepository = $groupRepository;
        $this->team = $team;
    }
    public function index()
    {
        $teams = $this->teamRepository->paginate();
        $groups = $this->groupRepository->all();
        return view('team.index', compact('teams', 'groups'));
    }

    public function getAdd(Request $request)
    {
        $groups = $this->groupRepository->all();
        return view('team.add', compact('groups'));
    }
    public function getAddConfirm(Request $request)
    {
        $groups = $this->groupRepository->all();
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
        $groups = $this->groupRepository->all();
        return view('team.edit', compact('team', 'groups'));
    }
    public function getEditConfirm(Request $request)
    {
        $groups = $this->groupRepository->all();
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
    public function getDelete(Request $request)
    {
        $request->id;
        return view('team.deleteConfirm');
    }
    public function delete(Request $request, $id)
    {
        $data = $request->all();
        $this->teamRepository->delete($id, $data);
        return redirect()->route('team.index')->with('message', 'You have delete the group successfully');
    }
    public function getSearch(Request $request, Builder $query)
    {
        $groups = $this->groupRepository->all();
        $group_id = $request->group_id;
        $search = $request->search;
        if ($request->sort_field != '' && $request->sort_type != '') 
        {
            if($request->sort_type == 'desc')
            {
                $teams = TeamModel::groupId($group_id)->name($search)->orderByDesc($request->sort_field)->paginate(3);

            } else if($request->sort_type == 'asc')
            {
                $teams = TeamModel::groupId($group_id)->name($search)->orderBy($request->sort_field)->paginate(3);
            }

        } else if ($request->sort_field == null && $request->sort_type == null) {
            $teams = TeamModel::groupId($group_id)->name($search)->paginate(3);
        }
        return view('team.index', compact('teams', 'groups'));
    }
}
