@extends('user.layouts.app')
@section('content')
    <main class="main login-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">{{ __('Verify Your Email Address') }}</h1>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},
                                    </div>
                                    <form class="d-inline" method="POST" action="{{ route('user.verification.resend') }}">
                                        @csrf
                                    <button type="submit" class="btn btn-primary">{{ __('click here to request another') }} </button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
