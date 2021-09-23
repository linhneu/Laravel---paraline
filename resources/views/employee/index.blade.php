@extends('layouts.frame')
@section('add')
<div class="col-md-2">
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
            <div class="col-md-10">
                <form action="{{route('employee.getSearch')}}" method="GET">
                    <div class="row">
                        <div class="col-md-12" style="display:flex">
                            <input type="text" name="name" class="form-control" style="margin-right:5px" placeholder="Enter Name" value="{{$_REQUEST['name'] ?? null}}">
                            <input type="text" name="email" class="form-control" style="margin-right:5px" placeholder="Enter Email" value="{{$_REQUEST['email'] ?? null}}">
                            <select class="form-control" name="team_id" style="margin-right:5px" >
                                <option value="">Choose team</option>
                                @foreach ($teams as $team)
                                <option value="{{$team->id}}" @if( isset($_REQUEST['team_id']) && $team->id == $_REQUEST['team_id'] ) selected @endif>
                                    {{$team->name}}
                                </option>
                                @endforeach
                            </select>
                            <select class="form-control" name="group_id">
                                <option value="">Choose group</option>
                                @foreach ($groups as $group)
                                <option value="{{$group->id}}" @if( isset($_REQUEST['group_id']) && $group->id == $_REQUEST['group_id']) selected @endif>
                                    {{$group->name}}
                                </option>
                                @endforeach
                            </select>
                            <input id="sort_field" type="hidden" name="sort_field" class="form-control">
                            <input id="sort_type" type="hidden" name="sort_type" class="form-control">

                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-1 mb-1" style="margin-left:15px">
                                <button id='searchSubmitTest' type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                </form>

            </div>
        </div>

    </div>
    <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <th onclick="sortByField('id')">ID</th>
                <th onclick="sortByField('last_name')">Name</th>
                <th onclick="sortByField('team_id')">Team</th>
                <th>Avatar</th>
                <th onclick="sortByField('position')">Position</th>
                <th onclick="sortByField('type_of_work')">Type_of_work</th>
                <th onclick="sortByField('status')" width="15%">Status</th>
                <th width="30%">Option</th>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->team->name}}</td>
                    <td>
                        @if($employee->avatar)
                        <img src="{{asset('/storage/images/employees/'.$employee->avatar) }} " width="50px">
                        @endif
                    </td>
                    <td>
                        <?php $lists = [1 => 'Manager', 2 => 'Team Leader', 3 => 'BSE', 4 => 'Dev', 5 => 'Tester'];
                        echo $lists[$employee->position];
                        ?>
                    </td>
                    <td>
                        <?php $lists = [1 => 'Nhân viên chính thức fulltime', 2 => 'Nhân viên partime', 3 => 'Nhân viên thử việc', 4 => 'Thực tập sinh'];
                        echo $lists[$employee->type_of_work]; 
                        ?>
                    </td>
                    <td>
                        <?php $lists = [1 => 'Đang làm việc', 2 => 'Đã nghỉ việc']; 
                        echo $lists[$employee->status];
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('employee.getDetail',['id'=>$employee->id]) }}">
                            Detail
                        </a>
                        <a class="btn btn-primary" href="{{ route('employee.getEdit',['id'=>$employee->id]) }}">
                            Edit
                        </a>
                        <a href="" data-id={{$employee->id}} data-toggle="modal" data-target="#delete" class="btn btn-danger open-delete-modal">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$employees->appends(request()->input())->links()}}
    </div>
</div>
</div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this employee?</p>
            </div>
            <form action="{{ route('employee.getDelete') }}" method="get">
                <input type="hidden" name="id" id="employeeid" value="">
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success" data-dismiss="modal" style="margin-right: 10px">No, Cancel</button>
                    <button type="submit" class="btn btn-warning">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).on('click', '.open-delete-modal', function() {
        let id = $(this).attr('data-id');
        $('#employeeid').val(id);
    });
</script>
@endsection