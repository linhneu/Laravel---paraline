@extends('layouts.frame')
@section('content')
<div class="card strpied-tabled-with-hover">
    <div class="card-header ">
        <h4 class="card-title">Edit team</h4>
        <p class="card-category"></p>
    </div>
    <div class="panel-body" style="margin-left: 15px">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="row" style="margin-bottom:40px">
                <div class="col-xs-8">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name',$team->name)}}">
                        @error('name')
                        <p class="text-danger text-center"  style="">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Group name</label>
                        <select class="form-control" name="group_id">
                            @foreach ($groups as $group)
                            <option value="{{$group->id}}"
                               @if($group->id == old('group_id', $team->group_id)) ?
                               selected
                               @endif>
                            {{$group->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{ url('/management/team')}}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection