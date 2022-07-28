@extends('user.layouts.app')

@section('content')

    <!-- Start of Main -->
    <main class="main login-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sign-up" class="nav-link">{{ __('Register') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">
                                <form method="POST" action="{{ route('user.login') }}">
                                    @csrf
                                <div class="form-group">
                                    <label>{{ __('Email Address') }} *</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <label>Password *</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-checkbox d-flex align-items-center justify-content-between">
                                    <input class="custom-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember1">{{ __('Remember Me') }}</label>
                                    @if (Route::has('user.password.request'))
                                    <a href="{{ route('user.password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                    @endif
                                </div>
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="sign-up">
                                <form method="POST" action="{{ route('user.register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{ __('Name') }}*</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Email Address') }}*</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Password') }}*</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                    <label>{{ __('Confirm Password') }} *</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                <p>Your personal data will be used to support your experience
                                    throughout this website, to manage access to your account,
                                    and for other purposes described in our <a href="#" class="text-primary">privacy policy</a>.</p>
                                <a href="{{ route('vendor.register') }}" class="d-block mb-5 text-primary">Signup as a vendor?</a>
                                <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                    <input type="checkbox" class="custom-checkbox" id="remember" name="remember" required="">
                                    <label for="remember" class="font-size-md">I agree to the <a  href="#" class="text-primary font-size-md">privacy policy</a></label>
                                </div>
                                    <button type="submit"  class="btn btn-primary">{{ __('Register') }}</button>
                                </form>
                            </div>

                        </div>
{{--                        <p class="text-center">Sign in with social account</p>--}}
{{--                        <div class="social-icons social-icon-border-color d-flex justify-content-center">--}}
{{--                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>--}}
{{--                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>--}}
{{--                            <a href="#" class="social-icon social-google fab fa-google"></a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End of Main -->
@endsection
