@extends('layouts.users.app')

@section('content')
<div class="bg-primary-custom h-view" style="padding-left: 15%; padding-right: 15%; padding-top: 3%;">
    <div class="container">
        <div class="d-flex flex-column flex-lg-row gap-0 gap-lg-3 align-items-center justify-content-between align-items-center">
            <div class="col-0 col-lg-6 col-md-0">
                <img src="{{ asset('assets/images/login_page_logo.png') }}" alt="Logo" class="w-full h-full"  />
            </div>
            <div class="col-12 col-lg-6">
                <form action="{{ url('/login/process') }}" method="POST">
                    @csrf
                    <div class="p-4 d-flex flex-column justify-content-even bg-white">
                        <div>
                            <h4 style="font-weight: bold;">LOGIN / REGISTER</h4>
                        </div>
                        <div class="form mt-4">
                            <div>
                                <input name="phone" type="text" class="custom-input-text w-full" placeholder="Phone Number" />
                            </div>
                            <div class="mt-4">
                            <button type="submit" class="custom-btn-primary w-full">NEXT</button>
                            </div>
                        </div>
                        <div class="row mt-4 font-xs text-center px-0 px-lg-4">
                            <p>
                                {{ __('page.terms_and_conditions') }}
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop