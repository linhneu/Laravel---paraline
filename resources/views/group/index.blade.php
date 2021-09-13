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
                <h4 class="card-title">Group List</h4>
                <p class="card-category"></p>
            </div>
            <div class="col-md-10">
        <form action="{{route('group.getSearch')}}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <input type="search" name="search" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mt-1 mb-1">
                <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form>

    </div>
            <div class="col-md-2">
            <a  href="{{url ('/management/group/add')}}" class="btn btn-round btn-fill btn-info">Add group</a>
            </div>
        </div>

    </div>
    <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Option</th>
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
                        <a class="btn btn-danger" style="margin-left: 5px" href="{{ route('group.delete',['id'=>$group->id]) }}">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$groups->links()}}
    </div>

</div>
</div>
</div>

    
        
@endsection