@extends('layouts.frame')
@section('content')
<div class="card strpied-tabled-with-hover">
    <div class="card-header ">
        <h4 class="card-title">Edit employee</h4>
        <p class="card-category"></p>
    </div>
    <div class="panel-body" style="margin-left: 15px">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="row" style="margin-bottom:40px">
                <div class="col-xs-8">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{old('first_name', $employee->first_name)}}">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{old('last_name', $employee->last_name )}}">
                    </div>
                    <div class="form-group">
                        <label>Team name</label>
                        <select class="form-control" name="team_id">
                            @foreach ($teams as $team)
                            <option value="{{$team->id}}" @if($team->id == old('team_id', $employee->team_id)) selected @endif>
                                {{$team->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{old('email', $employee->email)}}">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <?php $lists = [1 => 'Nam', 2 => 'Nữ']; ?>
                            @foreach($lists as $key => $value)
                            <option value={{$key}} @if($key==old('gender', $employee->gender)) selected @endif>
                                {{$value}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Birtday</label>
                        <input type="text" name="birthday" class="form-control" value="{{old('birthday', $employee->birthday)}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{old('address', $employee->address)}}">
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <input type="text" name="avatar" class="form-control" value="{{old('avatar', $employee->avatar)}}">
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="text" name="salary" class="form-control" value="{{old('salary', $employee->salary)}}">
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select class="form-control" name="position">
                            <?php $lists = [1 => 'Manager', 2 => 'Team Leader', 3 => 'BSE', 4 => 'Dev', 5 =>'Tester']; ?>
                            @foreach($lists as $key => $value)
                            <option value={{$key}} @if($key==old('position', $employee->position)) selected @endif>
                                {{$value}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <?php $lists = [1 => 'Đang làm việc', 2 => 'Đã nghỉ việc']; ?>
                            @foreach($lists as $key => $value)
                            <option value={{$key}} @if($key==old('status', $employee->status)) selected @endif>
                                {{$value}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type of work</label>
                        <select class="form-control" name="type_of_work">
                            <?php $lists = [1 => 'Nhân viên chính thức fulltime', 2 => 'Nhân viên partime', 3 => 'Nhân viên thử việc', 4 => 'Thực tập sinh']; ?>
                            @foreach($lists as $key => $value)
                            <option value={{$key}} @if($key==old('type_of_work', $employee->type_of_work)) selected @endif>
                                {{$value}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{ url('/management/employee')}}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection