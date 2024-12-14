@section('title')
    Profile
@endsection

@extends('layouts.users.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        @include('layouts.users.sidebar')
        <div class="col-10 col-lg-10 offset-2 offset-md-3 offset-lg-2 bg-secondary-custom">
            <div class="row px-3 py-3 align-items-end border-b-primary-custom sticky-top bg-secondary-custom">
                
                <div class="col-12 d-flex justify-content-end align-items-center gap-4">
                    {{-- <img class="d-block d-lg-none" src="{{ asset('assets/images/indonesia.png') }}" width="32" > --}}
                    <div>
                        <img src="{{ asset('assets/images/bell.png') }}" alt="Notification" height="32" width="32" class="mx-2"  />
                        <a href="{{ url('/profile') }}">
                            <img src="{{ asset('assets/images/user-profile.png') }}" alt="User" height="32" width="32"  />
                        </a>
                    
                    </div>
                    <div class="localization d-flex gap-3">
                        <img src="{{ asset('assets/images/inggris.jpg') }}" class="mx-2" width="32" >
                        {{-- slider --}}
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div>
                        <img src="{{ asset('assets/images/indonesia.png') }}" width="32" >
                    </div>
                </div>
                
            </div>
            <form action="{{ url('/profile/update') }}" method="POST">
                @csrf
                <div class="p-3 row vh-100">
                    <div class="col">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <h1 class="ms-4">Profile</h1>
                        <div class="ms-5">
                            <div class="form-group">
                                <input name="name" class="input-border-yellow-radius-full" type="text" placeholder="Name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group mt-2">
                                <input name="email" class="input-border-yellow-radius-full" type="text" placeholder="Email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group mt-2">
                                <input name="phone" class="input-border-yellow-radius-full" type="text" placeholder="No. Telephone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group mt-2">
                                <input name="address" class="input-border-yellow-radius-full" type="text" placeholder="Alamat Kampus" value="{{ $user->address }}">
                            </div>
                            <div class="form-group mt-2">
                                <input name="gender" class="input-border-yellow-radius-full" type="text" placeholder="Gender" value="{{ $user->gender }}">
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column gap-3">
                        {{-- img --}}
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('assets/images/user-profile.png') }}" alt="User" height="200" width="200" class="rounded-circle" />
                        </div>
                        <button class="input-border-yellow-radius-full">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
    
@stop