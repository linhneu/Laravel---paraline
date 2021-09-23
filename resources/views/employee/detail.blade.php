@extends('layouts.frame')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Employee Information</h4>
                <p class="card-category"></p>
            </div>
        </div>

    </div>
    <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped" style="font-size: 13px;">
            <thead>
                <th>ID</th>
                <th>Full name</th>
                <th>Team</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Avatar</th>
                <th>Salary</th>
                <th>Position</th>
                <th>Type_of_work</th>
                <th>Status</th>
            </thead>
            <tbody>
                
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->team->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>
                    <?php $lists = [1 => 'Nam', 2 => 'Nữ']; ?>
                    @foreach($lists as $key => $value)
                    @if($employee->gender == $key) {{$value}}
                    @endif
                    @endforeach
                    </td>
                    <td>{{$employee->birthday}}</td>
                    <td>{{$employee->address}}</td>
                    <td><img src="{{asset('/storage/images/employees/'.$employee->avatar) }} " width="50px"></td>
                    <td>{{$employee->salary}}</td>
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
                </tr>
               
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection