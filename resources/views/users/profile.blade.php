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
                        <img src="{{ asset('assets/images/user-profile.png') }}" alt="User" height="32" width="32"  />
                    
                    </div>
                    <div class="localization d-flex">
                        <img src="{{ asset('assets/images/inggris.jpg') }}" class="mx-2" width="32" >
                        {{-- slider --}}
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div>
                        <img src="{{ asset('assets/images/indonesia.png') }}" width="32" >
                    </div>
                </div>
                
            </div>
            <div class="p-3 row vh-100">
                <div class="col">
                    <h1 class="ms-4">Profile</h1>
                    <div class="ms-5">
                        <div class="form-group">
                            <input class="input-border-yellow-radius-full" type="text" placeholder="Username">
                        </div>
                        <div class="form-group mt-2">
                            <input class="input-border-yellow-radius-full" type="text" placeholder="Email">
                        </div>
                        <div class="form-group mt-2">
                            <input class="input-border-yellow-radius-full" type="password" placeholder="No. Telephone">
                        </div>
                        <div class="form-group mt-2">
                            <input class="input-border-yellow-radius-full" type="text" placeholder="Alamat Kampus">
                        </div>
                        <div class="form-group mt-2">
                            <input class="input-border-yellow-radius-full" type="text" placeholder="Gender">
                        </div>
                        <div class="form-group mt-2">
                            <input class="input-border-yellow-radius-full" type="text" placeholder="Riwayat Kost">
                        </div>
                    </div>
                </div>
                <div class="col position-relative">
                    {{-- img --}}
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('assets/images/user-profile.png') }}" alt="User" height="200" width="200" class="rounded-circle" />
                    </div>
                    <button class="input-border-yellow-radius-full position-absolute bottom-0 end-0">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
        
    </div>
</div>
    
@stop