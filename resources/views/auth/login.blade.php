{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
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
</div>
@endsection --}}


@extends('layouts.users.app')

@section('content')
<div class="bg-primary-custom h-view" style="padding-left: 15%; padding-right: 15%; padding-top: 3%;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-6 col-md-0">
                <img src="{{ asset('assets/images/login_page_logo.png') }}" alt="Logo" class="w-full h-full"  />
            </div>
            <div class="col-6 bg-white">
                <div class="p-4">
                    <div>
                        <h4 style="font-weight: bold;">REGISTER</h4>
                    </div>
                    <div class="form mt-4">
                        <div>
                            <input type="text" class="custom-input-text w-full" placeholder="Phone Number" />
                        </div>
                        <div class="mt-4">
                        <button class="custom-btn-primary w-full">NEXT</button>
                        </div>
                    </div>
                    {{-- OR WITH --}}
                    <div class="row mt-3">
                        <div class="col">
                            <hr />
                        </div>
                        <div class="col text-center">
                            <p>OR WITH</p>
                        </div>
                        <div class="col">
                            <hr />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="custom-btn-outline-secondary w-full">SIGN UP</button>
                        </div>
                        <div class="col">
                            <button class="custom-btn-outline-secondary w-full">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row mt-4 font-xs text-center px-4">
                        <p>By registering, You agree to the Terms, COnditions and Policies of Borcelle & Privacy Policy</p>
                    </div>
                    <div class="row mt-4">
                        <p>Have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop