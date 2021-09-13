<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamFormRequest;
use App\Models\TeamModel;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;


class TeamController extends Controller
{
    public function __construct(TeamRepository $teamRepository, GroupRepository $groupRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->groupRepository = $groupRepository;
    }
    public function index() 
    {
        $teams = $this->teamRepository->all();
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
        return redirect()->route('team.index');
    }
    public function getEdit(Request $request)
    {
        $id = $request->id;
        $team = $this->teamRepository->find($id);
        $groups = $this->groupRepository->all();
        return view('team.edit', compact('team','groups'));
    }
    public function getEditConfirm(Request $request)
    {
        $groups = $this->groupRepository->all();
        return view('team.editConfirm', compact('groups'));
    }
    public function postEdit(TeamFormRequest $request)
    {
        $request->all;
        return redirect()->route('team.getEditConfirm', ['id'=>$request->id])->withInput();
    }
    public function postEditConfirm(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $this->teamRepository->update($id, $data);
        return redirect()->route('team.index');
    }
    public function delete(Request $request,$id)
    {
        $data = $request->all();
        $this->teamRepository->delete($id, $data);
        return redirect()->route('team.index');
    }
    public function getSearch(Request $request)
    {
        $groups = $this->groupRepository->all();
        $group_id = $request->group_id;
        $search = $request->search;
        $teams = $this->teamRepository->findByField($search);
        TeamModel::groupId($group_id);
        return view('team.index', compact('teams', 'groups'));
    }
    

}
