@extends('layouts.users.app')

@section('content')
<div class="container-fluid p-0 relative">
    {{-- floating button on left bottom --}}
    <!-- Floating Button with Bootstrap 5 -->
    <button class="btn btn-primary position-fixed bottom-0 end-0 m-3 d-block d-md-none z-2">
        Konsultasi
    </button>
    <div class="navbar fixed-top mb-5 mb-lg-0">
        <img class="d-none d-md-block" src="{{ asset('assets/images/logo.png') }}" alt="">
        <div class="nav-items d-none d-md-block">
            <a href="{{ url('/') }}" class="mx-1" style="color: white;">Beranda</a>
            <a href="" class="mx-1" style="color: white;">Wilayah</a>
            <a href="" class="mx-1" style="color: white;">Properti</a>
            <a href="" class="mx-1" style="color: white;">Tentang</a>
        </div>
        <div class="nav-trailing d-none d-md-block">
            <button class="custom-btn-secondary">Konsultasi</button>
            <img src="{{ asset('assets/images/user.png') }}" class="mx-3" height="32" width="32">
        </div>
    </div>
    <div class="d-block d-md-flex bg-secondary-custom">
        <div class="order-1 order-2-lg w-100 w-md-50 d-flex flex-column justify-content-center trapezoid text-white">
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
                <div class="d-flex flex-row align-items-center mx-3">
                    <img class="me-2" src="{{ asset('assets/images/placeholder.png') }}" height="18" alt="">
                    <p>Kecamatan Cileunyi</p>
                </div>
            </div>
            <div class="d-flex align-items-center mt-3">
                <button class="custom-btn-white" style="font-weight: bold;">
                    <p>Ajukan Sewa</p>
                </button>
                <h3 class="mx-3" style="font-weight: 200;">Rp. 850.000/bulan</h3>
            </div>
        </div>
    
        <!-- Right section -->
        <div class="w-100 w-md-50 order-2 order-1-lg">
            <img src="https://media.cove.sg/34610/conversions/Cove-Cherry-Homes---Public-Area-small.jpg" class="w-100" alt="Sagita Kost">
        </div>
    </div>

    <div class="bg-primary-custom p-5">
        <div class="your-class mx-5">
            <div class="custom-white-card pb-5 d-flex flex-column align-items-center">
                <img src="https://media.cove.sg/34610/conversions/Cove-Cherry-Homes---Public-Area-small.jpg" class="rounded-circle" alt="Sagita Kost" height="52">
                <p class="mt-3" style="font-weight: bold">Parkiran</p>
            </div>
            <div class="custom-white-card pb-5 d-flex flex-column align-items-center">
                <img src="https://media.cove.sg/34610/conversions/Cove-Cherry-Homes---Public-Area-small.jpg" class="rounded-circle" alt="Sagita Kost" height="52">
                <p class="mt-3" style="font-weight: bold">Parkiran</p>
            </div>
            <div class="custom-white-card pb-5 d-flex flex-column align-items-center">
                <img src="https://media.cove.sg/34610/conversions/Cove-Cherry-Homes---Public-Area-small.jpg" class="rounded-circle" alt="Sagita Kost" height="52">
                <p class="mt-3" style="font-weight: bold">Parkiran</p>
            </div>
            <div class="custom-white-card pb-5 d-flex flex-column align-items-center">
                <img src="https://media.cove.sg/34610/conversions/Cove-Cherry-Homes---Public-Area-small.jpg" class="rounded-circle" alt="Sagita Kost" height="52">
                <p class="mt-3" style="font-weight: bold">Parkiran</p>
            </div>
            <div class="custom-white-card pb-5 d-flex flex-column align-items-center">
                <img src="https://media.cove.sg/34610/conversions/Cove-Cherry-Homes---Public-Area-small.jpg" class="rounded-circle" alt="Sagita Kost" height="52">
                <p class="mt-3" style="font-weight: bold">Parkiran</p>
            </div>
        </div>
    </div>
    
</div>
@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,  // When screen width is 768px or less
                settings: {
                slidesToShow: 1,  // Show 1 slide
                slidesToScroll: 1
                }
            },
            {
                breakpoint: 1024,  // When screen width is between 768px and 1024px
                settings: {
                slidesToShow: 2,  // Show 2 slides
                slidesToScroll: 1
                }
            }
        ]
      });
    });
  </script>
@stop