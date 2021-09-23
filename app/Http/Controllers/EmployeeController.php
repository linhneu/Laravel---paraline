<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormReQuest;
use App\Mail\SendEmail;
use App\Models\EmployeeModel;
use App\Models\GroupModel;
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
    public function index(Request $request)
    {
        $employees = $this->employeeRepository->paginate();
        if ($request->sort_field != '' && $request->sort_type != '') {
            if ($request->sort_type == 'desc') {
                $employees = EmployeeModel::orderByDesc($request->sort_field)->paginate(LIMIT_PER_PAGE);
            } else if ($request->sort_type == 'asc') {
                $employees = EmployeeModel::orderBy($request->sort_field)->paginate(LIMIT_PER_PAGE);
            }
        } else if ($request->sort_field == null && $request->sort_type == null) {
            $employees = EmployeeModel::paginate(LIMIT_PER_PAGE);
        }

        $teams = TeamModel::all();
        $groups = GroupModel::all();
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
        $teams = TeamModel::all();
        return view('employee.add', compact('teams'));
    }
    public function getAddConfirm()
    {
        $teams = TeamModel::all();
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
        $teams = TeamModel::all();
        return view('employee.edit', compact('employee', 'teams'));
    }
    public function getEditConfirm()
    {
        $teams = TeamModel::all();
        return view('employee.editConfirm', compact('teams'));
    }
    public function postEdit(EmployeeFormReQuest $request)
    {
        $request->all();
        $request->old('avatar');
        return redirect()->route('employee.getEditConfirm', ['id' => $request->id])->withInput();
    }
    public function postEditConfirm(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        if ($request->avatar == null) {
            $this->employeeRepository->find($request->id)->avatar;
        } else {
            $destination_path = 'public/images/employees';
            $image = $request->file('avatar');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('avatar')->storeAs($destination_path, $image_name);
            $data['avatar'] = $image_name;
        }
        $this->employeeRepository->update($id, $data);
        return redirect()->route('employee.index')->with('message', 'You have updated the account successfully');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $data['del_flag']= DEL_FLAG_BANNED;
        $this->employeeRepository->delete($id, $data);
        return redirect()->route('employee.index')->with('message', 'You have delete the employee successfully');
    }

    public function getSearch(Request $request)
    {
        $team_id = $request->team_id;
        $group_id = $request->group_id;
        $name = $request->name;
        $email = $request->email;
        $teams = TeamModel::all();
        $groups = TeamModel::all();
        $query = $this->employeeRepository->findByField($name);
        if($email != "") {
        $query->email($email);
        }
        if($team_id >0) {
        $query->teamId($team_id);
        }
        if($group_id >0) {
        $term = TeamModel::groupId($group_id)->select('id')->get();
        $query->whereIn('team_id', $term);
        }
        $employees = $query->paginate(5);
        if ($request->sort_field != '' && $request->sort_type != '') {
            if ($request->sort_type == 'desc') {
                $employees = $query->orderByDesc($request->sort_field)->paginate(5);
            } else if ($request->sort_type == 'asc') {
                $employees = $query->orderBy($request->sort_field)->paginate(5);
            }
        } else if ($request->sort_field == null && $request->sort_type == null) {
            $employees = $query->paginate(5);
        }
        return view('employee.index', compact('employees', 'teams', 'groups'));
    }
}
