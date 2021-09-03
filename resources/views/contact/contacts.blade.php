@extends('layout.main')
@section('content')
    <div class="panel panel-light">
        <div class="panel-header">
            <h1 class="panel-title">Products List</h1>
        </div>
        <div class="panel-body">
            @if (Session::has('success'))
                <div class="alert alert-success-light alert-dismissible" data-animation="fadeOutUp" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z">
                            </path>
                        </svg>
                    </button>
                </div>
            @endif
            <div class="row">


                <div class="col-md-12 my-2">
                    <div class="table-responsive-wrapper">
                        <table class="table table-bordered table-fixed" id="window-overflow">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $contact)
                                    <tr>
                                        <td>
                                            {{ $contact->id }}
                                        </td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>{{ $contact->created_at }}</td>
                                        <td class="operations">
                                            <button type="button" class="delete-btns btn-icon btn btn-danger-light"
                                                data-toggle="modal" data-target="#confirm-modal">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id="confirm-modal">
            
                <div class="modal-dialog modal-dialog-centered modal-confirm confirm-danger">
                  <form action="{{ route('contact.destroy',$contact->id ?? "")}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="fa fa-times"></i>
                            </div>
                            <h4 class="modal-title">Are you sure?</h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Do you really want to delete this item? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer row">
                            <div class="col-md-6 px-2">
                                <button class="btn my-1 btn-secondary btn-block" data-dismiss="modal">No</button>
                            </div>
                            <div class="col-md-6 px-2">
                                <button class="btn my-1 btn-danger btn-block" type="submit">YES</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            {{-- <div class="modal-dialog modal-dialog-centered modal-confirm confirm-danger">
                <form action="{{ route('contact.destroy', $contact->id ?? '') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="fa fa-times"></i>
                            </div>
                            <h4 class="modal-title">Are you sure?</h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Do you really want to delete this item? This process cannot be undone.
                            </p>
                        </div>
                        <div class="modal-footer row">
                            <div class="col-md-6 px-2">
                                <button class="btn my-1 btn-secondary btn-block" data-dismiss="modal">No</button>
                            </div>
                            <div class="col-md-6 px-2">
                                <button class="btn my-1 btn-danger btn-block" type="submit">YES</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> --}}
@endsection
