@extends('layouts.frame')
@section('content')
<div class="card strpied-tabled-with-hover">
    <div class="card-header ">
        <h4 class="card-title">Add group</h4>
        <p class="card-category"></p>
    </div>
    <div class="panel-body" style="margin-left: 15px">
        <form method="post" action="" enctype="multipart/form-data">
        @csrf
            <div class="row" style="margin-bottom:40px">
                <div class="col-xs-8">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                        <p class="text-danger text-center"  style="">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{ url('/management/group')}}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection

