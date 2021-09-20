<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupFormRequest;
use Illuminate\Http\Request;
use App\Repositories\GroupRepository;
use Illuminate\Support\Facades\Config;
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
        $data = $request->all();
        $this->groupRepository->delete($id, $data);
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
