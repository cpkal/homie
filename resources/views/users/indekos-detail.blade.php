@extends('layouts.users.app')

@section('content')
<div class="container-fluid p-0">
    <div class="navbar fixed-top">
        <img src="{{ asset('assets/images/logo.png') }}" alt="">
        <div class="nav-items">
            <a href="" class="mx-1" style="color: white;">Beranda</a>
            <a href="" class="mx-1" style="color: white;">Wilayah</a>
            <a href="" class="mx-1" style="color: white;">Properti</a>
            <a href="" class="mx-1" style="color: white;">Tentang</a>
        </div>
        <div class="nav-trailing">
            <button class="custom-btn-secondary">Konsultasi</button>
            <img src="{{ asset('assets/images/user.png') }}" class="mx-3" height="32" width="32">
        </div>
    </div>
    <div class="d-flex bg-secondary-custom">
        <div class="w-50 d-flex flex-column justify-content-center trapezoid text-white">
            <div class="rating">
                <img src="{{ asset('assets/images/star.png') }}" alt="star" height="32">
                <img src="{{ asset('assets/images/star.png') }}" alt="star" height="32">
                <img src="{{ asset('assets/images/star.png') }}" alt="star" height="32">
                <img src="{{ asset('assets/images/star.png') }}" alt="star" height="32">
                <img src="{{ asset('assets/images/star.png') }}" alt="star" height="32">
            </div>
            <h1 style="font-weight: bold;">Sagita Kost</h1>
            <div class="d-flex align-items-center">
                <button class="custom-btn-outline-third">
                    Kos Campur
                </button>
                <div class="d-flex mx-3">

                    <p>Kecamatan Cileunyi</p>
                </div>
            </div>
            <div class="d-flex align-items-center mt-3">
                <button class="custom-btn-white" style="font-weight: bold;">
                    Ajukan Sewa
                </button>
                <h3 class="mx-3" style="font-weight: 200;">Rp. 850.000/bulan</h3>
            </div>
        </div>
    
        <!-- Right section -->
        <div class="w-50">
            <img src="https://media.cove.sg/34610/conversions/Cove-Cherry-Homes---Public-Area-small.jpg" class="w-100" alt="Sagita Kost">
        </div>
    </div>

    <div class="bg-primary-custom">
        <div class="card-white-custom p-3 d-flex flex-column">
            <div class="row">
                <div class="col">
                    <div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@stop