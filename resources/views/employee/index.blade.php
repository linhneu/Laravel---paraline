@extends('layouts.frame')
@section('add')
<div class="col-md-2" >
    <a href="{{url ('/management/employee/add')}}" class="btn btn-round btn-fill btn-info">Add employee</a>
</div>
@endsection
@section('message')
@if(Session::has('message'))
<p class="alert alert-success col-md-4">
    {{Session::get('message')}}
</p>
@endif
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Employee List</h4>
                <p class="card-category"></p>
            </div>
            <div class="col-md-10" >
                <form action="{{route('employee.getSearch')}}" method="GET" >
                    <div class="row">
                        <div class="col-md-4" style="font-size: 14px;">
                            <input type="text" name="name" class="form-control">
                            <input type="text" name="email" class="form-control">
                            <select class="form-control" name="team_id">
                                <option value="">Choose team</option>
                                @foreach ($teams as $team)
                                <option value="{{$team->id}}">
                                    {{$team->name}}
                                </option>
                                @endforeach
                            </select>
                            <select class="form-control" name="group_id">
                                <option value="">Choose group</option>
                                @foreach ($groups as $group)
                                <option value="{{$group->id}}">
                                    {{$group->name}}
                                </option>
                                @endforeach
                            </select>
                            <input id="sort_field" type="hidden" name="sort_field" class="form-control">
                            <input id="sort_type" type="hidden" name="sort_type" class="form-control">

                        </div>
                        <div class="row">
                            <div class="col-md-8 mt-1 mb-1">
                                <button id='searchSubmitTest' type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                </form>

            </div>
        </div>

    </div>
    <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped" >
            <thead>
                <th onclick="sortByField('id')" >ID</th>
                <th onclick="sortByField('name')">Name</th>
                <th>Team</th>
                <th>Avatar</th>
                <th>Position</th>
                <th>Type_of_work</th>
                <th width="15%">Status</th>
                <th width="30%">Option</th>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->team->name}}</td>
                    <td>
                        <img src="{{asset('/storage/images/employees/'.$employee->avatar) }} " width="50px">
                    </td>
                    <td>
                        <?php $lists = [1 => 'Manager', 2 => 'Team Leader', 3 => 'BSE', 4 => 'Dev', 5 => 'Tester']; ?>
                        @foreach($lists as $key => $value)
                        @if($employee->position == $key) {{$value}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <?php $lists = [1 => 'Nhân viên chính thức fulltime', 2 => 'Nhân viên partime', 3 => 'Nhân viên thử việc', 4 => 'Thực tập sinh']; ?>
                        @foreach($lists as $key => $value)
                        @if($employee->type_of_work == $key) {{$value}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <?php $lists = [1 => 'Đang làm việc', 2 => 'Đã nghỉ việc']; ?>
                        @foreach($lists as $key => $value)
                        @if($employee->status == $key) {{$value}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-primary"  href="{{ route('employee.getDetail',['id'=>$employee->id]) }}">
                            Detail
                        </a>
                        <a class="btn btn-primary" href="{{ route('employee.getEdit',['id'=>$employee->id]) }}">
                            Edit
                        </a>
                        <a class="btn btn-danger" style="margin-left: 5px" href="{{ route('employee.getDelete',['id'=>$employee->id]) }}">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$employees->links()}}
    </div>
</div>
</div>
</div>
@endsection