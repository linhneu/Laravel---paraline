@extends('layouts.frame')
@section('add')
<div class="col-md-2">
    <a href="{{route ('group.getAdd')}}" class="btn btn-round btn-fill btn-info">Add group</a>
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
                <h4 class="card-title">Group List</h4>
                <p class="card-category"></p>
            </div>
            <div class="col-md-10">
                <form action="{{route('group.getSearch')}}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="search" name="search" class="form-control" placeholder="Enter Name" value="{{$_REQUEST['search'] ?? null}}">
                            <input id="sort_field" type="hidden" name="sort_field" class="form-control">
                            <input id="sort_type" type="hidden" name="sort_type" class="form-control">
                        </div>
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
                <th onclick="sortByField('id')" width="10%">ID</a></th>
                <th onclick="sortByField('name')" width="70%">Name</th>
                <th width="">Option</th>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                <tr>
                    <td>{{$group->id}}</td>
                    <td>{{$group->name}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('group.getEdit',['id'=>$group->id]) }}">
                            Edit
                        </a>
                        <a href="" data-id={{$group->id}} data-toggle="modal" data-target="#delete" class="btn btn-danger open-delete-modal">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$groups->appends(request()->input())->links()}}
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
                <p>Are you sure to delete this group?</p>
            </div>
            <form action="{{ route('group.getDelete') }}" method="get">
                <input type="hidden" name="id" id="groupid" value="">
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
        $('#groupid').val(id);
    });
</script>
@endsection