@extends('layout.main')
@section('content')
    <div class="page-container">

        <!-- Main Page Content -->
        <div class="page-content">
            <form action="{{ route('user.updateprofile', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
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

                    <div class="col-md-12">

                        <div class="card mt-24 card-user-profile-wide">
                            <div class="row no-gutters">
                                <div class="col col-avatar py-3 py-md-0">
                                    <div class="user-avatar-inside-svg">
                                        <div class="user-avatar">
                                            <img src="{{ asset('storage/logo/' . $user->id . '/' . $user->logo) }}"
                                                class="avatar avatar-4 rounded-circle" alt="Avatar image">
                                        </div>
                                        <svg viewBox="0 0 36 36" width="100" height="100" class="donut">
                                            <circle class="donut-ring" cx="18" cy="18" r="15.91549430918952"
                                                fill="transparent" stroke="#eeeeee" stroke-width="2"></circle>
                                            <circle class="donut-segment" cx="18" cy="18" r="15.91549430918952"
                                                fill="transparent" stroke="#06c48c" stroke-width="2"
                                                stroke-dasharray="70 30" stroke-dashoffset="25"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col col-info">


                                    <div class="row">

                                        <div class="col">

                                            <div class="d-inline-block mr-4">
                                                <h6 class="user-fullname">{{ $user->name }}</h6>
                                                <h6 class="user-name">{{ $user->company }}</h6>
                                            </div>

                                            <span
                                                class="badge badge-pill badge-outline-info align-top">{{ $user->roles->name ?? "" }}</span>

                                        </div>



                                    </div>

                                    <div class="row mt-3">

                                        <div class="col">

                                            <p class="text-muted mb-0">
                                            </p>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- User Profile -->
                        <div class="panel panel-light h-auto">
                            <div class="panel-header">
                                <h1 class="panel-title">{{ $user->name }} Profile</h1>
                                <div class="panel-toolbar">
                                    <ul class="nav nav-pills nav-pills-lg nav-pills-label" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link px-md-5 active" data-toggle="tab" href="#user-profile-tab-1"
                                                role="tab" aria-selected="false">
                                                Personal
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link px-md-5" data-toggle="tab" href="#user-profile-tab-2"
                                                role="tab" aria-selected="false">
                                                Security
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body">

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="user-profile-tab-1" aria-expanded="true">

                                        <div class="mx-auto" style="max-width: 500px;">

                                            <h5 class="mb-3">Personal Information</h5>

                                            <div class="form-group">
                                                <label for="">First Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $user->name }}" placeholder="Enter first name here...">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Last Name</label>
                                                <input type="text" class="form-control" name="last_name"
                                                    value="{{ $user->last_name }}" placeholder="Enter last name here...">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $user->email }}" placeholder="Enter last name here...">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Company</label>
                                                <input type="text" class="form-control" name="company"
                                                    value="{{ $user->company }}" placeholder="Enter last name here...">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Capital</label>
                                                <input type="text" class="form-control" name="capital"
                                                    value="{{ $user->capital }}" placeholder="Enter last name here...">
                                            </div>

                                            <div class="form-group">
                                                <label for="">TAX Ref-Number</label>
                                                <input type="text" class="form-control" name="tax_ref_number"
                                                    value="{{ $user->tax_ref_number }}"
                                                    placeholder="Enter last name here...">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Avatar</label>
                                                <div class="custom-file custom-image custom-image-avatar">
                                                    <input type="file" name="personal_image"
                                                        data-placeholder="{{ asset('storage/personal_image/' . $user->id . '/' . $user->personal_image) }}"
                                                        class="custom-image-input" id="customImage">
                                                    <label class="custom-image-label" for="customImage">+</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Company Logo</label>
                                                <div class="custom-file custom-image custom-image-avatar">
                                                    <input type="file" name="logo"
                                                        data-placeholder="{{ asset('storage/logo/' . $user->id . '/' . $user->logo) }}"
                                                        class="custom-image-input" id="customImage">
                                                    <label class="custom-image-label" for="customImage">+</label>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="">Address</label>
                                                    <input type="text" class="form-control" name="capital"
                                                    value="{{ $user->address }}" placeholder="Enter last name here...">
                                            </div>

                                            <div class="form-group text-right">
                                                <button class="btn btn-info-lightened">Update profile</button>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="user-profile-tab-2" aria-expanded="true">

                                        <div class="mx-auto" style="max-width: 500px;">

                                            <h5 class="mb-3">Security</h5>

                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" value="{{ $user->password }}"
                                                    placeholder="Merged Buttons" class="form-control" value="your-password">
                                            </div>

                                            <div class="form-group">
                                                <label for="">New Password</label>
                                                <div class="input-group input-group-merged input-group-password-toggle">
                                                    <input type="password" name="password" placeholder="Merged Buttons"
                                                        class="form-control" value="{{ $user->password }}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-white btn-icon btn-password-toggle"
                                                            type="button">
                                                            <i class="fas icon-see fa-eye"></i>
                                                            <i class="fas icon-hide fa-eye-slash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-wide btn-primary">Update
                                                    Profile</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- User Profile -->

                    </div>

                </div>

            </form>
        </div>
    @endsection
