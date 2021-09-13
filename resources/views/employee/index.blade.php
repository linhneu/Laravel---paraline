@extends('layouts.frame')
@section('content')
@if ( Session::has('success') )
<div class="alert alert-success alert-dismissible" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
</div>
@endif

@if ( Session::has('error') )
<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>{{ Session::get('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Employee List</h4>
                <p class="card-category"></p>
            </div>
            <div class="col-md-10">
                <form action="{{route('employee.getSearch')}}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control">
                            <select class="form-control" name="team_id">
                                <option value="">Choose team</option>
                                @foreach ($teams as $team)
                                <option value="{{$team->id}}">
                                    {{$team->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mt-1 mb-1">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                </form>

            </div>
            <div class="col-md-2">
                <a href="{{url ('/management/employee/add')}}" class="btn btn-round btn-fill btn-info">Add employee</a>
            </div>
        </div>

    </div>
    <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Team</th>
                <th>Avatar</th>
                <th>Position</th>
                <th>Type_of_work</th>
                <th>Status</th>
                <th>Option</th>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->team->name}}</td>
                    <td>
                        <img src="{{$employee->avatar}} " width="50px">
                    </td>
                    <td>
                    <?php $lists = [1 => 'Manager', 2 => 'Team Leader', 3 => 'BSE', 4 => 'Dev', 5 =>'Tester']; ?>
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
                        <a class="btn btn-primary" href="{{ route('employee.getDetail',['id'=>$employee->id]) }}">
                            Detail
                        </a>
                        <a class="btn btn-primary" href="{{ route('employee.getEdit',['id'=>$employee->id]) }}">
                            Edit
                        </a>
                        <a class="btn btn-danger" style="margin-left: 5px" href="{{ route('employee.delete',['id'=>$employee->id]) }}">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection