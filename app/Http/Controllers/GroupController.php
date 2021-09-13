<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupFormRequest;
use Illuminate\Http\Request;
use App\Repositories\GroupRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Console\Input\Input;

class GroupController extends Controller
{
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }
    public function index()
    {
        $groups = $this->groupRepository->paginate();
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
        return redirect()->route('group.index');
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
        return redirect()->route('group.getEditConfirm', ['id'=>$request->id])->withInput();
    }
    public function postEditConfirm(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $this->groupRepository->update($id, $data);
        return redirect()->route('group.index');
    }
    public function delete(Request $request, $id)
    {
        $data = $request->all();
        $this->groupRepository->delete($id, $data);
    }

    public function getSearch(GroupFormRequest $request)
    {
        $search = $request->search;
        $groups = $this->groupRepository->findByField($search);
        return view('group.index', compact('groups'));
    }
}
