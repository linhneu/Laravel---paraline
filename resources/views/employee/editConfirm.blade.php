@extends('layouts.frame')
@section('content')
<div class="card strpied-tabled-with-hover">
    <div class="card-header ">
        <h4 class="card-title">Do you agree to change this information?</h4>
        <p class="card-category"></p>
    </div>
    <div class="panel-body" style="margin-left: 15px">
        <form method="post" enctype="multipart/form-data" id="the-form">
            @csrf
            <div class="row" style="margin-bottom:40px">
                <div class="col-xs-8">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Team name</label>
                        <select class="form-control" name="team_id" readonly>
                            @foreach ($teams as $team)
                            <option value="{{$team->id}}" @if($team->id == old('team_id')) selected @endif>
                                {{$team->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender" readonly>
                            <?php $lists = [1 => 'Nam', 2 => 'Nữ']; ?>
                            @foreach($lists as $key => $value)
                            <option value={{$key}} @if($key==old('gender')) selected @endif>
                                {{$value}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Birtday</label>
                        <input type="text" name="birthday" class="form-control" value="{{old('birthday')}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{old('address')}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Avatar</label>
                        <input type="text" class="form-control" value="{{Session::get('avatar')}}" readonly>
                        <input hidden type="text" id="img-confirm" class="form-control" name="avatar" value="{{ Session::get('avatar') }}">
                        <img src="{{asset('/storage/images/employees/'.Session::get('avatar')) }} " alt="">
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="text" name="salary" class="form-control" value="{{old('salary')}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select class="form-control" name="position" readonly>
                            <?php $lists = [1 => 'Manager', 2 => 'Team Leader', 3 => 'BSE', 4 => 'Dev', 5 => 'Tester']; ?>
                            @foreach($lists as $key => $value)
                            <option value={{$key}} @if($key==old('position')) selected @endif>
                                {{$value}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" readonly>
                            <?php $lists = [1 => 'Đang làm việc', 2 => 'Đã nghỉ việc']; ?>
                            @foreach($lists as $key => $value)
                            <option value={{$key}} @if($key==old('status')) selected @endif>
                                {{$value}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type of work</label>
                        <select class="form-control" name="type_of_work" readonly>
                            <?php $lists = [1 => 'Nhân viên chính thức fulltime', 2 => 'Nhân viên partime', 3 => 'Nhân viên thử việc', 4 => 'Thực tập sinh']; ?>
                            @foreach($lists as $key => $value)
                            <option value={{$key}} @if($key==old('type_of_work')) selected @endif>
                                {{$value}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="button" id="btn-confirm" class="btn btn-primary">Agree</button>
                    <a href="javascript:history.back()" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>

</div>
<div class="modal fade" id="mi-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to edit this group?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="modal-btn-no" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" id="modal-btn-yes" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    var modalConfirm = function(callback) {

        $("#btn-confirm").on("click", function() {
            $("#mi-modal").modal('show');
        });

        $("#modal-btn-yes").on("click", function() {
            callback(true);
            $("#mi-modal").modal('hide');
            $('#the-form').submit();
        });

        $("#modal-btn-no").on("click", function() {
            callback(false);
            $("#mi-modal").modal('hide');
        });
    };
    modalConfirm(function(confirm) {
        if (confirm) {
            $("#result").html("CONFIRMADO");
        } else {
            $("#result").html("NO CONFIRMADO");
        }
    });
    $(document).ready(function() {
        $("input[type='image']").click(function(e) {
            e.preventDefault();
            $("input[id='id-confirm']").click();
        });
    })
</script>
@endsection