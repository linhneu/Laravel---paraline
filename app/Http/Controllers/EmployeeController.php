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
use Dotenv\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationData;
use Symfony\Component\Console\Input\Input;

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
        if ($request->hasFile('avatar')) {
            $destination_path = 'public/images/employees';
            $image = $request->file('avatar');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('avatar')->storeAs($destination_path, $image_name);
        }
        return redirect()->route('employee.getAddConfirm')->withInput()->with('avatar', $image_name);
    }
    public function postAddConfirm(Request $request)
    {
        $data = $request->all(); //stack: vào truocw ra sau hoặc ngược lại vs queue: vào trước ra trước
        $email = $request->email;
        Mail::to($email)->send(new SendEmail($data));
        $this->employeeRepository->create($data);
        return redirect()->route('employee.index')->with('message', 'You have created an account successfully');
    }
    public function getEdit(Request $request)
    {
        $id = $request->id;
        $employee = $this->employeeRepository->find($id);
        if (!$employee) {
            return redirect()->route('group.index')->with('message', 'Sorry id does not exist');
        }
        $teams = TeamModel::all();
        return view('employee.edit', compact('employee', 'teams'));
    }
    public function getEditConfirm()
    {
        $teams = TeamModel::all();
        return view('employee.editConfirm', compact('teams'));
    }
    public function postEdit(EmployeeFormReQuest $request) // truyền vào param
    {
        $request->all();
        if($request->hasFile('avatar')){
        $destination_path = 'public/images/employees';
        $image = $request->file('avatar');
        $image_name = $image->getClientOriginalName();
        $path = $request->file('avatar')->storeAs($destination_path, $image_name);
        }
        return redirect()->route('employee.getEditConfirm', ['id' => $request->id])->withInput()->with('avatar', $image_name ?? null);
    }
    public function postEditConfirm(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        if ($request->avatar == null) {
            $data['avatar'] = $this->employeeRepository->find($request->id)->avatar;
        }
        $this->employeeRepository->update($id, $data);
        return redirect()->route('employee.index')->with('message', 'You have updated the account successfully');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        if (!$this->employeeRepository->find($id)) {
            return redirect()->route('group.index')->with('message', 'Sorry id does not exist');
        }
        $data['del_flag'] = DEL_FLAG_BANNED;
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
        $groups = GroupModel::all();
        $query = $this->employeeRepository->findByField($name);
        if ($email != "") {
            $query->email($email);
        }
        if ($team_id > 0) {
            $query->teamId($team_id);
        }
        if ($group_id > 0) {
            $term = TeamModel::groupId($group_id)->select('id')->get();
            $query->whereIn('team_id', $term);
        }
        if ($request->sort_field != '' && $request->sort_type != '') {
            if ($request->sort_type == 'desc') {
                $employees = $query->orderByDesc($request->sort_field)->paginate(LIMIT_PER_PAGE);
            } else if ($request->sort_type == 'asc') {
                $employees = $query->orderBy($request->sort_field)->paginate(LIMIT_PER_PAGE);
            }
        } else if ($request->sort_field == null && $request->sort_type == null) {
            $employees = $query->paginate(LIMIT_PER_PAGE);
        }
        return view('employee.index', compact('employees', 'teams', 'groups'));
    }
}
