@section('title')
    {{ $room->indekos->name  . ' - ' . $room->name }}
@endsection 

@extends('layouts.users.app')

@section('content')
<div class="container-fluid p-0 relative">
    {{-- floating button on left bottom --}}
    <!-- Floating Button with Bootstrap 5 -->
    <a href="https://api.whatsapp.com/send/?phone=08965345&text=Hai saya ingin konsultasi untuk kos {{$room->indekos->name }} dengan tipe kamar {{$room->name}}" class="btn btn-primary position-fixed bottom-0 end-0 m-3 d-block d-md-none z-2">
        Konsultasi
    </a>
    <div class="navbar fixed-top mb-5 mb-lg-0">
        <a href="{{ url('/') }}">
            <img class="d-none d-md-block" src="{{ asset('assets/images/logo.png') }}" alt="">
        </a>
        <div class="nav-items d-none d-md-block">
            <a href="{{ url('/') }}" class="mx-1" style="color: white;">Beranda</a>
            <a href="#wilayah" class="mx-1" style="color: white;">Wilayah</a>
            <a href="#fasilitas" class="mx-1" style="color: white;">Properti</a>
            <a href="#tentang" class="mx-1" style="color: white;">Tentang</a>
        </div>
        <div class="nav-trailing d-none d-md-block">
            <a href="https://api.whatsapp.com/send/?phone=08965345&text=Hai saya ingin konsultasi untuk kos {{$room->indekos->name}} dengan tipe kamar {{$room->name}} " class="custom-btn-secondary">Konsultasi</a>
            <a href="{{ url('/profile') }}">
                <img src="{{ asset('assets/images/user.png') }}" class="mx-3" height="32" width="32">
            </a>
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
            <h1 id="tentang" style="font-weight: bold;">{{  $room->indekos->name . ' - ' . $room->name }}</h1>
            <div class="d-flex align-items-center">
                <button class="custom-btn-outline-third">
                    Kos {{ $room->roomType->type_name }}
                </button>
                <div class="d-flex flex-row align-items-center mx-3" id="wilayah">
                    <img class="me-2" src="{{ asset('assets/images/placeholder.png') }}" height="18" alt="">
                    <p>{{ $room->indekos->address ?? '' }}</p>
                </div>
            </div>
            <div class="d-flex align-items-center mt-3">
                <a href="https://api.whatsapp.com/send/?phone=08965345&text=Hai saya ingin booking {{$room->indekos->name }} dengan tipe kamar {{ $room->name }}" class="custom-btn-white" style="font-weight: bold;">
                    <p>Ajukan Sewa</p>
                </a>
                <h3 class="mx-3" style="font-weight: 200;">{{ $room->toRupiah() }}</h3>
            </div>
        </div>
    
        <!-- Right section -->
        <div class="w-100 w-md-50 order-2 order-1-lg">
            <img src="{{ $room->image ?? 'https://salonlfc.com/wp-content/uploads/2018/01/image-not-found-scaled.png' }}" class="w-100" alt="Sagita Kost">
        </div>
    </div>

    <div class="bg-primary-custom p-5" id="fasilitas">
        <div class="your-class mx-5">
            @foreach ($facilities as $facility)
                <div class="custom-white-card pb-5 d-flex flex-column align-items-center">
                    <img src="{{ $facility->image ?? 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Image-not-found.png'  }}" class="rounded-circle" alt="Sagita Kost" height="52">
                    {{-- try to query facilities by facility_id on facility --}}
                    <p class="mt-3" style="font-weight: bold">{{ $facility->name }} </p>
                </div>
            @endforeach
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