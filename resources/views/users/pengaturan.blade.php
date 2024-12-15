@section('title')
    Pengaturan
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
                    <form action="{{ route('set-locale') }}" method="POST">
                        @csrf
                        <div class="localization d-flex w-full gap-3 justify-content-around">
                            <!-- English Language Icon -->
                            <img src="{{ asset('assets/images/inggris.jpg') }}" class="mx-2" width="32" alt="English">
                            
                            <!-- Language Toggle Switch -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switchLanguage" 
                                       {{ app()->getLocale() === 'id' ? 'checked' : '' }}>
                            </div>
                            
                            <!-- Indonesian Language Icon -->
                            <img src="{{ asset('assets/images/indonesia.png') }}" width="32" alt="Bahasa Indonesia">
                        </div>
                        
                        <!-- Hidden Input for Locale -->
                        <input type="hidden" name="locale" id="localeInput" value="{{ app()->getLocale() }}">
                    </form>
                </div>
                
            </div>
            <div class="row vh-100">
                <div class="col-5 p-4 d-flex flex-column align-items-center ">
                    <div class="white-radius-full">
                        <p class="fw-bold">
                            {{ __('page.history_rental') }}
                        </p>
                    </div>
                    {{-- <div class="white-radius-full mt-4">
                        <p class="fw-bold">Riwayat Transaksi</p>
                    </div> --}}
                </div>
                <div class="col-7 border border-l-primary-custom">
                    {{-- listtile --}}
                    {{-- if history_order count == 0 --}}
                    @if (count($history_orders) == 0)
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-around align-items-center border-b-primary-custom p-3 bg-primary-custom rounded">
                                    <div>
                                        <p class="font-bold">{{ __('page.no_history') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        @foreach ($history_orders as $history_order)

                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="d-flex justify-content-around align-items-center border-b-primary-custom p-3 bg-primary-custom rounded">
                                        <div>
                                            <img src="{{ $history_order->room->image ?? 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Image-not-found.png' }}" class="rounded-circle" height="75" width="75" class="img-fluid" />
                                        </div>
                                        <div>
                                            <p class="font-bold">{{ $history_order->room->name }}</p>
                                            <p class="font-bold">{{ $history_order->room->address }}</p>
                                            <p class="font-bold">{{ $history_order->room->toRupiah() }}</p>
                                        </div>
                                        <div>
                                            {{-- format dd mm yy hh:mm --}}
                                            <p class="font-bold">{{ $history_order->getBookingDateAttribute($history_order->created_at) }}</p>

                                            {{-- badge success --}}


                                            {{-- badge --}}
                                            <div class="badge {{ $history_order->status == 'confirmed' ? 'bg-success' : 'bg-danger' }}  text-white">{{ $history_order->status == 'confirmed' ? __('page.confirmed') : __('page.cancelled') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</div>
    
@stop

@section('js')
    <script>


        document.addEventListener('DOMContentLoaded', function () {
            const switchLanguage = document.getElementById('switchLanguage');
            const localeInput = document.getElementById('localeInput');
            const form = switchLanguage.closest('form');
            
            switchLanguage.addEventListener('change', function () {
                // Set locale based on the switch state
                localeInput.value = switchLanguage.checked ? 'id' : 'en';
                
                // Submit the form
                form.submit();
            });
        });

    </script>
@endsection