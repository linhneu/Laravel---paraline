<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormReQuest;
use App\Mail\SendEmail;
use App\Models\EmployeeModel;
use App\Models\TeamModel;
use Illuminate\Http\Request;
use App\Repositories\GroupRepository;
use App\Repositories\TeamRepository;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function __construct(EmployeeRepository $employeeRepository, TeamRepository $teamRepository, GroupRepository $groupRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->teamRepository = $teamRepository;
        $this->groupRepository = $groupRepository;
    }
    public function index()
    {
        $employees = $this->employeeRepository->paginate();
        $teams = $this->teamRepository->all();
        $groups = $this->groupRepository->all();
        return view('employee.index', compact('employees', 'teams', 'groups'));
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
        if ($request->hasFile('avatar')) {
            $destination_path = 'public/images/employees';
            $image = $request->file('avatar');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('avatar')->storeAs($destination_path, $image_name);

            $data['avatar'] = $image_name;
        }
        $email = $request->email;
        Mail::to($email)->send(new SendEmail($data));

        $this->employeeRepository->create($data);
        return redirect()->route('employee.index')->with('message', 'You have created an account successfully');
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
        $request->avatar;
        return redirect()->route('employee.getEditConfirm', ['id' => $request->id])->withInput();
    }
    public function postEditConfirm(Request $request)
    {
        if ($request->avatar == null) {
            $this->employeeRepository->find($request->id)->avatar;
        } else {
            $image = $request->file('avatar');
            $storedPath = $image->move('img', $image->getClientOriginalName());
        }
        $request->avatar;
        $id = $request->id;
        $data = $request->all();
        $this->employeeRepository->update($id, $data);
        return redirect()->route('employee.index')->with('message', 'You have updated the account successfully');
    }
    public function getDelete(Request $request)
    {
        $request->id;
        return view('employee.deleteConfirm');
    }
    public function delete(Request $request, $id)
    {
        $data = $request->all();
        $this->employeeRepository->delete($id, $data);
        return redirect()->route('employee.index')->with('message', 'You have delete the group successfully');
    }

    public function getSearch(Request $request)
    {
        $team_id = $request->team_id;
        $group_id = $request->group_id;
        $name = $request->name;
        $email = $request->email;
        $teams = $this->teamRepository->all();
        $groups = $this->groupRepository->all();
        $employees = EmployeeModel::name($name)->email($email)->teamId($team_id)->groupId($group_id);
        return view('employee.index', compact('employees', 'teams', 'groups'));
    }
}
