@extends('layouts.frame')
@section('content')
<div class="card strpied-tabled-with-hover">
    <div class="card-header ">
        <h4 class="card-title">Add group</h4>
        <p class="card-category"></p>
    </div>
    <div class="panel-body" style="margin-left: 15px">
        <form method="post" enctype="multipart/form-data">
        @csrf
            <div class="row" style="margin-bottom:40px">
                <div class="col-xs-8">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="">
                    </div>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#dialog1">Add</button>
                    <a href="{{ url('/admin/group')}}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialog1">
    Mở hộp thoại
</button>

<div class="modal fade" id="dialog1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title">Agree or not?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <label for=""> Confirm creating a new group'name</label>
                <h5>{{$name}}</h5>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
            
        </div>
    </div>

</div>
@endsection
@section('script')
<script>
    $('#dialog1').modal('show')
</script>
@endsection

