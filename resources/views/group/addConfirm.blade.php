@extends('layouts.frame')
@section('content')

<div class="card strpied-tabled-with-hover">
    <div class="card-header ">
        <h4 class="card-title">Add group</h4>
        <p class="card-category"></p>
    </div>
    <div class="panel-body" style="margin-left: 15px">
        <form method="post" enctype="multipart/form-data" id="the-form">
            @csrf
            <div class="row" style="margin-bottom:40px">
                <div class="col-xs-8">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control name" value="{{old('name')}}" readonly>
                    </div>
                    <button type="button" id="btn-confirm" class="btn btn-primary"> Agree</button>
                    <a href="javascript:history.back()" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>

</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="mi-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Add Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to add this group?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" id="modal-btn-no" class="btn btn-success" data-dismiss="modal" style="margin-right: 10px">No, Cancel</button>
                <button type="submit" id="modal-btn-yes" class="btn btn-warning">Yes, save changes</button>
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
</script>
@endsection