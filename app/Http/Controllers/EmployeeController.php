<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormReQuest;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;
use App\Repositories\GroupRepository;
use App\Repositories\TeamRepository;
use App\Repositories\EmployeeRepository;


class EmployeeController extends Controller
{
    public function __construct(EmployeeRepository $employeeRepository, TeamRepository $teamRepository, GroupRepository $groupRepository )
    {
        $this->employeeRepository = $employeeRepository;
        $this->teamRepository = $teamRepository;
        $this->groupRepository = $groupRepository;
    }
    public function index()
    {
        $employees = $this->employeeRepository->all();
        $teams = $this->teamRepository->all();
        return view('employee.index', compact('employees', 'teams'));
    }
    public function getDetail(Request $request)
    {
        $id = $request->id;
        $employee = $this->employeeRepository->find($id);
        return view('employee.detail', compact('employee'));
    }
    public function getAdd(Request $request)
    {
        $teams = $this->teamRepository->all();
        return view('employee.add', compact('teams'));
    }
    public function getAddConfirm()
    {
        $teams = $this->teamRepository->all();
        return view('employee.addConfirm', compact('teams'));
    }
    public function postAdd(EmployeeFormReQuest $request)
    {
        $request->all();
        return redirect()->route('employee.getAddConfirm')->withInput();
    }
    public function postAddConfirm(Request $request)
    {
        $data = $request->all();
        $this->employeeRepository->create($data);
        return redirect()->route('employee.index');
    }
    public function getEdit(Request $request)
    {
        $id = $request->id;
        $employee = $this->employeeRepository->find($id);
        $teams = $this->teamRepository->all();
        return view('employee.edit', compact('employee', 'teams'));
    }
    public function getEditConfirm()
    {
        $teams = $this->teamRepository->all();
        return view('employee.editConfirm', compact('teams'));
    }
    public function postEdit(EmployeeFormReQuest $request)
    {
        $request->all();
        return redirect()->route('employee.getEditConfirm', ['id'=>$request->id])->withInput();
    }
    public function postEditConfirm(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $this->employeeRepository->update($id, $data);
        return redirect()->route('employee.index');
    }
    public function delete(Request $request, $id)
    {
        $data = $request->all();
        $this->employeeRepository->delete($id, $data);
        return redirect()->route('employee.index');
    }

    public function getSearch(Request $request)
    {
        $team_id = $request->team_id;
        $name = $request->name;
        $employees = $this->employeeRepository->findByField($name);
        EmployeeModel::TeamId($team_id);
        $teams = $this->teamRepository->all();
        return view('employee.index', compact('employees', 'teams'));
    }
}
