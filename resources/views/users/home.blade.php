@extends('layouts.users.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        @include('layouts.users.sidebar')
        <div class="col-10 col-lg-8 offset-2 offset-md-3 offset-lg-2 bg-secondary-custom">
            <div class="row px-3 py-3 align-items-center justify-content-between border-b-primary-custom sticky-top bg-secondary-custom">
                <div class="col-8">
                    <input type="text" class="w-100 input-custom" placeholder="Cari...">
                </div>
                <div class="col-4 d-flex">
                    {{-- <img class="d-block d-lg-none" src="{{ asset('assets/images/indonesia.png') }}" width="32" > --}}
                    <img src="{{ asset('assets/images/bell.png') }}" alt="Notification" height="32" width="32" class="mx-2"  />
                    <img src="{{ asset('assets/images/user-profile.png') }}" alt="User" height="32" width="32"  />
                </div>
            </div>
            <div class="p-3">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    @foreach ($indekos_with_rooms as $item)
                    <div class="col">
                        <a href="{{ url('/indekos/' . $item->id) }}">
                            <div>
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSeVsof0lPg6HGNNZJs7RnDa8SFQYTxIxUSA&s" class="custom-card-thumbnail ratio-portrait" alt="Doctor" />
                            </div>
                            <div class="custom-card-body px-4 py-3 d-flex align-items-center justify-content-between">
                                <div class="mt-4 mt-lg-4">
                                    <p class="fw-bold">{{ $item->rooms[0]->name }}</p>
                                    <p class="fw-normal">{{ $item->rooms[0]->price }}</p>
                                </div>
                                <img src="{{ asset('assets/images/plus.png') }}" class="mt-4" height="32" width="32" />
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-none d-lg-block col-2 offset-10 fixed-top vh-100 bg-secondary-custom border-l-primary-custom">
            <div class="localization d-flex w-full p-4 justify-content-around">
                <img src="{{ asset('assets/images/inggris.jpg') }}" class="mx-2" width="32" >
                {{-- slider --}}
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                </div>
                <img src="{{ asset('assets/images/indonesia.png') }}" width="32" >
            </div>
            <div class="user-profile-card p-4 d-flex flex-column align-items-center mt-5">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpUAAT12ROzUrJj9wazmTCbvjGtLIcpe7QNg&s" class="rounded-circle" width="52" >

                <p class="text-center mt-1 " style="font-weight: bold;">Wahyu Susilo</p>
                <p class="text-center">Cibiru, indonesia </p>
            </div>
            <div class="mt-5 text-white overflow-">
                <h5>Pesanan Terkini</h5>
                <div class="card-pesanan-terkini d-flex mt-3 align-items-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSeVsof0lPg6HGNNZJs7RnDa8SFQYTxIxUSA&s" class="me-2 img-squared" height="52" />
                    <div style="font-size: 14px;">
                        <p>Kost Azzahra 2</p>
                        <p>Rp. 1.000.000 / bulan</p>
                    </div>
                </div>

                <div class="card-pesanan-terkini d-flex mt-3 align-items-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSeVsof0lPg6HGNNZJs7RnDa8SFQYTxIxUSA&s" class="me-2 img-squared" height="52" />
                    <div style="font-size: 14px;">
                        <p>Kost Azzahra 2</p>
                        <p>Rp. 1.000.000 / bulan</p>
                    </div>
                </div>

                <div class="card-pesanan-terkini d-flex mt-3 align-items-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSeVsof0lPg6HGNNZJs7RnDa8SFQYTxIxUSA&s" class="me-2 img-squared" height="52" />
                    <div style="font-size: 14px;">
                        <p>Kost Azzahra 2</p>
                        <p>Rp. 1.000.000 / bulan</p>
                    </div>
                </div>

            </div>
        </div>

        
    </div>
</div>
    
@stop