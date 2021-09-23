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
                        <div class="col-md-4" >
                            <input type="text" name="search" class="form-control" style="margin-bottom:5px" placeholder="Enter Name" value="{{$_REQUEST['search'] ?? null}}">
                            <select class="form-control" name="group_id">
                                <option value="">Choose group</option>
                                @foreach ($groups as $group)
                                <option value="{{$group->id}}"  @if( isset($_REQUEST['group_id']) && $group->id == $_REQUEST['group_id']) selected @endif>
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
                <th onclick="sortByField('group_id')" width="35%">Group</th>
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
                        <a href="" data-id={{$team->id}} data-toggle="modal" data-target="#delete" class="btn btn-danger open-delete-modal">
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
                <p>Are you sure to delete this team?</p>
            </div>
            <form action="{{ route('team.getDelete') }}" method="get">
                <input type="hidden" name="id" id="teamid" value="">
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
        $('#teamid').val(id);
    });
</script>

@endsection
