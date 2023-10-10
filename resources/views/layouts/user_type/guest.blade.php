@extends('layouts.app')

@section('guest')
    @if(\Request::is('login/forgot-password'))
        @include('layouts.navbars.guest.nav')
        @yield('content')
    @else
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    @include('layouts.navbars.guest.nav')
                    <main class="main-content mt-1 border-radius-lg">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
        @include('layouts.footers.guest.footer')
    @endif
@endsection
