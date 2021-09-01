@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">User List</h1>
    </div>
    <div class="panel-body">
        <a href="{{route('user.create')}}" class="btn btn-info-lightened"><span>Add New User</span></a>
        <br>
        <br>
        <div class="row">

            <div class="col-md-12 my-2">

                <table id="datatable-column-search" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($users as $user)
                            <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td><a class="badge badge-info">{{ $user->roles->name }}</a></td>
                                    <td class="operations operations-buttons">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            {{-- <a href="{{ route('client.show',$company->id) }}" class="btn btn-sm btn-primary-light">View</a> --}}
                                            <a href="{{ route('user.editall', $user->id) }}" class="btn btn-sm btn-info-light">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger-light">Delete</button>
                                            </form>
                                        </td>
                                </form>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
      
        {{-- <script src="{{asset('js/vendor.js')}}"></script> --}}
        <!-- Page's links to JS dependencies goes here. -->
        
		

@endsection