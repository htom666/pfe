@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html class="no-js" lang="en">
    
<!-- Mirrored from exon.arsaland.com/html/pages/auth/login-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Aug 2020 13:01:13 GMT -->
<head>
        <title>Exon Admin Dashboard Template</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="icon" type="image/png" href="../../assets/favicon.png">
        <link rel="apple-touch-icon" href="../../assets/apple-touch-icon.png">

        <link rel="stylesheet" href="../../css/vendor.css">

        <!-- Fontawesome -->
		<link rel="stylesheet" href="../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"/>
        <!-- Dosis & Poppins Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;523;600;700;800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../../layouts/layout-1/css/app.css">
        <link rel="stylesheet" href="../../css/auth.css">
    </head>

    <body>

		<div id="app" class="login-page login-page-3">

			<div class="container">
						
				<!-- Login Panel -->
				<div class="panel shadow-lg">
					<div class="row no-gutters">
	
						<div class="col-md-8">

							<div class="panel-body panel-image" style="background-image: url('../../assets/auth/6047404.svg');">
		
							</div>
	
						</div>
	
						<div class="col-md-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf        

							<div class="panel-body panel-form bg-white">

								<h1 class="form-title">{{ __('Login') }}</h1>

								<div class="form-group">
									<label for="email">{{ __('E-Mail Address') }}</label>
									<div class="input-group input-group-squared">
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
									</div>
								</div>


								<div class="form-group">
									<label for="password">{{ __('Password') }}</label>
									<div class="input-group input-group-squared">
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
									</div>
								</div>
                                <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    
                                </div>
                                <div class="form-group form-group-btns text-center">
                                    <div class="row no-gutters">
                                        <div class="col-md-12">
                                        <button type="submit" class="btn btn-block btn-lg shadow-lg btn-squared btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                        </div>
                                    </div>
                                </div>
		
							</div>
                            </form>
	
						</div>
					
					</div><!-- .row -->
				</div><!-- / Login Panel -->
					
			</div><!-- .container -->

		</div>

        <script src="../../js/vendor.js"></script>
		<script src="../../js/app.js"></script>

    </body>

<!-- Mirrored from exon.arsaland.com/html/pages/auth/login-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Aug 2020 13:01:13 GMT -->
</html> 
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
