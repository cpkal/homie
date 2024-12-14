
@section('title')
    Homie
@endsection

@extends('layouts.users.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        @include('layouts.users.sidebar')
        <div class="col-10 col-lg-8 offset-2 offset-md-3 offset-lg-2 bg-secondary-custom">
            <div class="row px-3 py-3 align-items-center justify-content-between border-b-primary-custom sticky-top bg-secondary-custom">
                <form class="col-8" action="{{ url('') }}" method="GET">
                    @csrf
                    <div >
                        <input type="text" name="search" class="w-100 input-custom" placeholder="Cari...">
                    </div>
                </form>
                <div class="col-4 d-flex">
                    <div class="dropdown rounded">
                        <!-- Bell Icon -->
                        <img src="{{ asset('assets/images/bell.png') }}" alt="Notification" height="32" width="32" class="mx-2" data-bs-toggle="dropdown" aria-expanded="false" />
                    
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="min-width: 350px; max-height: 300px; overflow-y: auto;">
                            @foreach ($notifications as $notification)
                                <!-- Notification 1 -->
                                <div class="d-flex align-items-center p-3">
                                    <img src={{ $notification->image ?? 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Image-not-found.png'  }}  alt="User" class="rounded-circle me-3" width="50" />
                                    <div class="notification-{{ $notification->id }}">
                                        <h6 class="mb-1">{{ $notification->title }}</h6>
                                        <p class="mb-0">{{ $notification->message }}</p>
                                    </div>
                                </div>
                                {{-- if last iteration dont show divider --}}
                                @if (!$loop->last)
                                    <hr class="dropdown-divider">
                                @endif
                            @endforeach
                            
                        </div>
                    
     
                    
                    <a href="{{ url('/profile') }}">
                        <img src="{{ asset('assets/images/user-profile.png') }}" alt="User" height="32" width="32"  />
                    </a>
                </div>
            </div>
            <div class="p-3 min-vh-100">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    @foreach ($indekos_with_rooms as $item)
                        @foreach ($item['rooms'] as $room)
                            <div class="col">
                                <a href="{{ url('/indekos/' . $room->id) }}">
                                    <div>
                                        <img src="{{ $room['image'] ?? 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Image-not-found.png' }}" class="custom-card-thumbnail ratio-portrait" alt="Doctor" />
                                    </div>
                                    <div class="custom-card-body px-4 py-3 d-flex align-items-center justify-content-between">
                                        <div class="mt-4 mt-lg-4">
                                            <p class="fw-bold">{{ $item['name']. ' - ' .$room['name'] }}</p>
                                            <p class="fw-normal">{{ $room->toRupiah() }}</p>
                                        </div>
                                        <img src="{{ asset('assets/images/plus.png') }}" class="mt-4" height="32" width="32" />
                                    </div>
                                </a>
                            </div>
                            
                        @endforeach
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
            
            @if (Auth::check())
                <div class="user-profile-card p-4 d-flex flex-column align-items-center mt-5">
                    <img src="{{ Auth::user()->image ?? asset('assets/images/user-profile.png') }}" class="rounded-circle" width="52" >

                    <p class="text-center mt-1 " style="font-weight: bold;">
                        {{ Auth::user()->name ?? Auth::user()->phone }}
                    </p>
                    <p class="text-center">
                        {{ Auth::user()->address ?? 'Indonesia' }}
                    </p>
                </div>
            @endif


            <div class="mt-5 text-white overflow-">
                <h5>Pesanan Terkini</h5>
                @foreach ($recent_succeed_bookings as $item)
                    <div class="card-pesanan-terkini d-flex mt-3 align-items-center">
                        <img src="{{ $item->room->image ?? 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Image-not-found.png' }}" class="me-2 img-squared" height="52" />
                        <div style="font-size: 14px;">
                            <p>{{ $item->indekos->name . ' - ' . $item->room->name }}</p>
                            <p>{{ $item->room->toRupiah() }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        
    </div>
</div>
    
@stop

@section('js')
    <script>
        // when dropdown notification on click, mark as read and send also id to backend
        $('.dropdown').on('click', function() {
            // get list notification id from id start with notification-*
            const notificationId = $(this).attr('id').split('-')[1];

            console.log(notificationId);

            const response = await fetch(`http://localhost:8000/api/notifications/`, 
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify({
                    id: notificationId
                })
            });
            );
        });
    </script>
@endsection