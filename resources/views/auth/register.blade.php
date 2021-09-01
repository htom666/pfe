@extends('layouts.app')
@section('content')
<div id="app" class="login-page register-1">

    <!-- Login Panel -->
    <div class="panel">
        <div class="row no-gutters">

            <div class="col-md-6 col-form">

                <div class="panel-body panel-form">

                    <h1 class="form-title">Register</h1>

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputFName">First Name</label>
                            <div class="input-group input-group-merged">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLName">Last Name</label>
                            <div class="input-group input-group-merged">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <div class="input-group input-group-merged">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNumber">Company</label>
                            <div class="input-group input-group-merged">
                                <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company">
                                @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-city"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Capital</label>
                            <div class="input-group input-group-merged">
                                <input id="capital" type="text" class="form-control @error('capital') is-invalid @enderror" name="capital" value="{{ old('capital') }}" required autocomplete="capital">
                                @error('capital')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-money-check-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNumber">Address</label>
                            <div class="input-group input-group-merged">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                                @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Tax Ref Number</label>
                            <div class="input-group input-group-merged">
                                <input id="tax_ref_number" type="text" class="form-control @error('tax_ref_number') is-invalid @enderror" name="tax_ref_number" value="{{ old('tax_ref_number') }}" required autocomplete="tax_ref_number">
                                @error('tax_ref_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-sort-numeric-up-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <div class="input-group input-group-merged">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-lock-open"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password-confirm">Confirm Password</label>
                            <div class="input-group input-group-merged">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-md-3 pt-2">Avatar</label>
                        <div class="col-md-6">
                            <div class="custom-file custom-image custom-image-avatar">
                                <input type="file" name="personal_image" data-placeholder="../../../assets/misc/placeholder.jpg" class="custom-image-input" id="customImage">
                                <label class="custom-image-label" for="customImage">+</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-3 pt-2">Company Logo</label>
                        <div class="col-md-6">
                            <div class="custom-file custom-image custom-image-avatar">
                                <input type="file" name="logo" data-placeholder="../../../assets/misc/placeholder.jpg" class="custom-image-input" id="customImage">
                                <label class="custom-image-label" for="customImage">+</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-btns text-center mb-0">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-block btn-lg btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>

            </div>

            <div class="col-md-6">

                <div class="panel-body panel-image" style="background-image: url('../../assets/auth/denny-muller-jLjfAWwHdB8-unsplash.jpg');">

                </div>

            </div>
        
        </div><!-- .row -->
    </div><!-- / Login Panel -->
            
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-md4 col-form-label text-md-right">{{__('Logo')}}</label>
                            <div class="col-md-6">
                                <input id="logo" type="file" name="logo">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
