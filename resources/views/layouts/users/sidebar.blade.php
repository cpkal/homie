<div class="col-2 col-md-3 col-lg-2 bg-primary-custom border-r-primary-custom vh-100 fixed-top">
    <div>
        <div class="p-3 p-md-1">
            {{-- center --}}
            <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid d-none d-lg-block" alt="Logo" />
            {{-- <img src="{{ asset('assets/images/logo_mobile.jpeg') }}" class="img-fluid d-block d-lg-none" alt="Logo" /> --}}
        </div>
        
        {{-- <div class="p-3">
            <button class="custom-btn-secondary text-center p-0 p-md-2 w-100 d-flex flex-column align-items-center" style="border-radius: 40px / 35px; font-size: 16px;">
                <p class="d-none d-md-block">Wilayah</p>
                <img class="d-block d-md-none" src="{{ asset('assets/images/placeholder.png') }}" height="18" width="18">
            </button>
        </div> --}}
        <div class="py-3 px-2">
            <div class="d-flex align-items-center {{ request()->is('/') ? 'custom-btn-secondary text-white' : '' }}" style="border-radius: 40px / 35px; font-size: 16px;">
                <img src="{{ asset('assets/images/home.png') }}" class="mx-2" height="18" width="18" />
                <a href="{{ url('/') }}" class="d-none d-md-block" style="color: {{ request()->is('/') ? 'white' : 'black' }}">
                    {{ __('page.home') }}
                </a>
            </div>
        </div>
        <div class="py-3 px-2">
            <div class="d-flex align-items-center {{ request()->is('profile') ? 'custom-btn-secondary text-white' : '' }}" style="border-radius: 40px / 35px; font-size: 16px;">
                <img src="{{ asset('assets/images/user.png') }}" class="mx-2" height="18" width="18" />
                <a href="{{ url('/profile') }}" class="d-none d-md-block"  style="color: {{ request()->is('profile') ? 'white' : 'black' }}">{{ __('page.profile') }}</a>
            </div>
        </div>
        <div class="py-3 px-2">
            <div class="d-flex align-items-center {{ request()->is('pengaturan') ? 'custom-btn-secondary text-white' : '' }}" style="border-radius: 40px / 35px; font-size: 16px;">
                <img src="{{ asset('assets/images/setting.png') }}" class="mx-2" height="18" width="18" />
                <a href="{{ url('/pengaturan?tab=history_order') }}" class="d-none d-md-block"  style="color: {{ request()->is('pengaturan') ? 'white' : 'black' }}">{{ __('page.setting') }}</a>
            </div>
        </div>
    </div>

    @if (Auth::check())
        <div class="position-absolute bottom-0">
            <div class="pb-2 p-lg-3 text-white">
                <a href="{{ url('/logout') }}">
                    {{ __('page.logout') }}
                </a>
            </div>
        </div>
    @endif
</div>