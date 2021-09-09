<?php

namespace App\Http\Controllers;

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
        $teams = TeamModel::with('group')->get();
        return view('team.index', compact('teams'));
    }
    
    public function getAdd(Request $request)
    {
        $groups = $this->groupRepository->all();
        return view('team.add', compact('groups'));
    }
    public function postAdd(Request $request)
    {
        $data = $request->all();
        $name = $request->get('name');
        //return view('team.addConfirm')->with($name);
        //redirect()->route('team.addConfirm')->with('data',$data);
        $this->teamRepository->create($data);
    }
    public function getEdit(Request $request)
    {
        $id = $request->id;
        $team = $this->teamRepository->find($id);
        //$teams = TeamModel::with('group')->get();
        $groups = $this->groupRepository->all();
        return view('team.edit', compact('team','groups'));
    }
    public function postEdit(Request $request, $id)
    {
        $data = $request->all();
        $this->teamRepository->update($id, $data);
    }
    public function delete(Request $request,$id)
    {
        $data = $request->all();
        $this->teamRepository->delete($id, $data);
        //$teams = $this->teamRepository->all();
        //return view('team.index', compact($teams))->with('message', 'You have deleted successfully!');
    }
    public function find(Request $request)
    {
        
    }

}
