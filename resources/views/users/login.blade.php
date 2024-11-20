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