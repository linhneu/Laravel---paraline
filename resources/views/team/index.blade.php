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
                <h4 class="card-title">Team List</h4>
                <p class="card-category"></p>
            </div>
            <div class="col-md-10">
                <form action="{{route('team.getSearch')}}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control">
                            <select class="form-control" name="group_id">
                                <option value="">Choose group</option>
                                @foreach ($groups as $group)
                                <option value="{{$group->id}}">
                                    {{$group->name}}
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
                <a href="{{url ('/management/team/add')}}" class="btn btn-round btn-fill btn-info">Add team</a>
            </div>
        </div>

    </div>
    <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Group</th>
                <th>Option</th>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                <tr>
                    <td>{{$team->id}}</td>
                    <td>{{$team->name}}</td>
                    <td>{{$team->group->name}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('team.getEdit',['id'=>$team->id]) }}">
                            Edit
                        </a>
                        <a class="btn btn-danger" style="margin-left: 5px" href="{{ route('team.delete',['id'=>$team->id]) }}">
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