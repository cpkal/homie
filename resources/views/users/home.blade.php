@extends('layouts.users.app')

@section('content')

<div class="w-full">
    <div class="row">
        <div class="col-2 bg-primary-custom border-r-primary-custom">
            <div class="p-3">
                {{-- center --}}
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" />
            </div>
            
            <div class="p-3">
                <button class="custom-btn-secondary text-center p-2 w-full" style="border-radius: 40px / 35px; font-size: 16px;">Wilayah</button>
            </div>
            <div class="p-3 px-4">
                <div class="row">
                    <a href="" class="a-custom">Beranda</a>
                </div>
            </div>
            <div class="p-3 px-4">
                <div class="row">
                    <a href="" class="a-custom">Beranda</a>
                </div>
            </div>
            <div class="p-3 px-4">
                <div class="row">
                    <a href="" class="a-custom">Beranda</a>
                </div>
            </div>
        </div>
        <div class="col-8 bg-secondary-custom">
            <div class="row px-3 py-2 align-items-center justify-content-between border-b-primary-custom">
                <div class="col-8">
                    <input type="text" class="w-full">
                </div>
                <div class="col-2">
                    <p>Icon</p>
                </div>
            </div>
            <div class="p-3">
                <div class="row">
                    <div class="col">
                        x
                    </div>
                    <div class="col">
                        y
                    </div>
                    <div class="col">
                        z
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 bg-secondary-custom border-l-primary-custom"></div>
    </div>

</div>
    
@stop