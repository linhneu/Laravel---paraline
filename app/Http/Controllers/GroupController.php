<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GroupRepository;

class GroupController extends Controller
{
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }
    public function index() 
    {
        $groups = $this->groupRepository->all();
        return view('group.index', compact('groups'));
    }
    
    public function getAdd(Request $request)
    {
        return view('group.add');
    }
    public function postAdd(Request $request)
    {
        $data = $request->all();
        $name = $request->get('name');
        //return view('group.addConfirm')->with($name);
        //redirect()->route('group.addConfirm')->with('data',$data);
        $this->groupRepository->create($data);
    }
    public function getEdit(Request $request)
    {
        $id = $request->id;
        $group = $this->groupRepository->find($id);
        return view('group.edit', compact('group'));
    }
    public function postEdit(Request $request, $id)
    {
        $data = $request->all();
        $this->groupRepository->update($id, $data);
    }
    public function delete(Request $request,$id)
    {
        $data = $request->all();
        $this->groupRepository->delete($id, $data);
        //$groups = $this->groupRepository->all();
        //return view('group.index', compact($groups))->with('message', 'You have deleted successfully!');
    }
    public function find(Request $request)
    {
        
    }

}
