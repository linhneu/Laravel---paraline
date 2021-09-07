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
    public function create(Request $request)
    {
        $data = $request->all();
        $group = $this->groupRepository->create($data);
        return view('group.create', compact('group'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $group = $this->groupRepository->update($id, $data);
        return view('group.update', compact('group'));
    }
    public function delete(Request $request,$id)
    {
        $data = $request->all();
        $this->groupRepository->delete($id, $data);
        return view('group.index')->with('message', 'You have deleted successfully!');
    }
    public function find(Request $request)
    {
        
    }

}
