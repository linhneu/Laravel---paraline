@extends('layouts.frame')
@section('add')
<div class="col-md-2">
    <a href="{{url ('/management/team/add')}}" class="btn btn-round btn-fill btn-info">Add team</a>
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
                            <input id="sort_field" type="hidden" name="sort_field" value="">
                            <input id="sort_type" type="hidden" name="sort_type" value="">
                        </div>
                        <div class="row">
                            <div class="col-md-8 mt-1 mb-1">
                                <button id='searchSubmitTest' type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                </form>

            </div>
        </div>

    </div>
    <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped" id="myTable">
            <thead>
                <th onclick="sortByField('id')" width="10%">ID</th>
                <th onclick="sortByField('name')" width="35%">Name</th>
                <th width="35%">Group</th>
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
                        <a class="btn btn-danger" style="margin-left: 5px" href="{{ route('team.getDelete',['id'=>$team->id]) }}">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$teams->appends(request()->input())->links()}}
    </div>
</div>
</div>
</div>

@endsection
@section('script')
@endsection
