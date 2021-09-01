@extends('layout.main')
@section('content')
<div class="panel panel-light">
  <div class="panel-header">
      <h1 class="panel-title">Roles List</h1>
  </div>
  <div class="panel-body">
      <a href="{{route('roles.create')}}" class="btn btn-info-lightened"><span>Add New Role</span></a>
      <br>
      <br>
      <div class="row">

          <div class="col-md-12 my-2">

              <table id="datatable-column-search" class="table table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Creation Date</th>
                          <th>Permissions</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Creation Date</th>
                        <th>Permissions</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($roles as $role)
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->created_at->diffForHumans()}}</td>
                    <td> 
                      @foreach ($role->permissions as $permission)
                      <span class="m-1 badge badge-success">{{$permission}}</span>
                      
                      
                    @endforeach
                    </td>
                    <form action="{{route('roles.delete',$role->id)}}" method="POST">
                      @csrf
                                <td>
                                  <a href="{{ route('roles.edit', $role->id) }}"
                                    class="btn-icon btn btn-primary-light" data-toggle="tooltip" title="Edit">
                                    <svg fill="#5780f7" viewBox="0 0 1024 1024">
                                        <path
                                            d="M978.101 45.898c-28.77-28.768-67.018-44.611-107.701-44.611-40.685 0-78.933 15.843-107.701 44.611l-652.8 652.8c-2.645 2.645-4.678 5.837-5.957 9.354l-102.4 281.6c-3.4 9.347-1.077 19.818 5.957 26.85 4.885 4.888 11.43 7.499 18.104 7.499 2.933 0 5.891-0.502 8.744-1.541l281.6-102.4c3.515-1.28 6.709-3.312 9.354-5.958l652.8-652.8c28.768-28.768 44.613-67.018 44.613-107.702s-15.843-78.933-44.613-107.701zM293.114 873.883l-224.709 81.71 81.712-224.707 566.683-566.683 142.997 142.997-566.683 566.683zM941.899 225.098l-45.899 45.899-142.997-142.997 45.899-45.899c19.098-19.098 44.49-29.614 71.498-29.614s52.4 10.518 71.499 29.616c19.098 19.098 29.616 44.49 29.616 71.498s-10.52 52.4-29.616 71.498z">
                                        </path>
                                    </svg>
                                </a>
                                <button type="submit"
                                    class="delete-btns btn-icon btn btn-danger-light" data-id="1"
                                    data-toggle="tooltip" title="Delete">
                                    <svg fill="#ed3472" viewBox="0 0 1024 1024">
                                        <path
                                            d="M793.6 102.4h-179.2v-25.6c0-42.347-34.453-76.8-76.8-76.8h-102.4c-42.347 0-76.8 34.453-76.8 76.8v25.6h-179.2c-42.347 0-76.8 34.453-76.8 76.8v51.2c0 33.373 21.403 61.829 51.2 72.397v644.403c0 42.349 34.453 76.8 76.8 76.8h512c42.349 0 76.8-34.451 76.8-76.8v-644.403c29.797-10.568 51.2-39.024 51.2-72.397v-51.2c0-42.347-34.451-76.8-76.8-76.8zM409.6 76.8c0-14.115 11.485-25.6 25.6-25.6h102.4c14.115 0 25.6 11.485 25.6 25.6v25.6h-153.6v-25.6zM742.4 972.8h-512c-14.115 0-25.6-11.485-25.6-25.6v-640h563.2v640c0 14.115-11.485 25.6-25.6 25.6zM819.2 230.4c0 14.115-11.485 25.6-25.6 25.6h-614.4c-14.115 0-25.6-11.485-25.6-25.6v-51.2c0-14.115 11.485-25.6 25.6-25.6h614.4c14.115 0 25.6 11.485 25.6 25.6v51.2z">
                                        </path>
                                        <path class="path2"
                                            d="M640 358.4c-14.139 0-25.6 11.462-25.6 25.6v512c0 14.139 11.461 25.6 25.6 25.6s25.6-11.461 25.6-25.6v-512c0-14.138-11.461-25.6-25.6-25.6z">
                                        </path>
                                        <path class="path3"
                                            d="M486.4 358.4c-14.138 0-25.6 11.462-25.6 25.6v512c0 14.139 11.462 25.6 25.6 25.6s25.6-11.461 25.6-25.6v-512c0-14.138-11.462-25.6-25.6-25.6z">
                                        </path>
                                        <path class="path4"
                                            d="M332.8 358.4c-14.138 0-25.6 11.462-25.6 25.6v512c0 14.139 11.462 25.6 25.6 25.6s25.6-11.461 25.6-25.6v-512c0-14.138-11.462-25.6-25.6-25.6z">
                                        </path>
                                    </svg>
                                </button>
                          </td>
                      </tr>
                    </form>
                   @endforeach
                  </tbody>
              </table>
          </div>

      </div>
  </div>
</div>
{{-- <a  type="button" href="{{route('roles.create')}}">create role</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">created</th>
        <th>permission</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
      <tr>

        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td>{{$role->created_at->diffForHumans()}}</td>
        <td>  @foreach ($role->permissions as $permission)
          {{$permission}}
        @endforeach</td>
        <form action="{{route('roles.delete',$role->id)}}" method="POST">
          @csrf
        <td><a href="{{route('roles.edit',$role->id)}}">Edit</a>
        
        <button type="submit"> delete</button>
      </form>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>
 --}}

  @endsection