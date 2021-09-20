@extends('layouts.frame')
@section('content')

<div class="card strpied-tabled-with-hover">
    <div class="card-header ">
        <h4 class="card-title">Do you want to delete this information?</h4>
        <p class="card-category"></p>
    </div>
    <div class="panel-body" style="margin-left: 15px">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="row" style="margin-bottom:40px">
                <div class="col-xs-8">
                    <button type="submit" class="btn btn-primary">Agree</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection