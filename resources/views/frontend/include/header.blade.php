@php
    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp
<header class="header sms-header header-style-2">
    <div id="sms-sticky-placeholder"></div>
    <div class="sms-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-logo">
                    <a wire:navigate href="{{route('index')}}">
                        <img
                            src="{{asset('frontend/assets/images/logo.svg')}}"
                            alt="logo"
                        />
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav" id="mobilemenu-popup">
                        <div class="d-block d-lg-none">
                            <div class="mobile-nav-header">
                                <div class="mobile-nav-logo">
                                    <a href="{{route('index')}}">
                                        <img
                                            class="light-mode"
                                            src="{{asset('frontend/assets/images/logo-2.svg')}}"
                                            alt="Site Logo"
                                        />
                                    </a>
                                </div>
                                <button
                                    class="mobile-menu-close"
                                    data-bs-dismiss="offcanvas"
                                >
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <ul class="mainmenu">
                            <li>
                                <a class="{{$currentRoute == 'index' ? 'active':''}}" wire:navigate href="{{route('index')}}"> Home </a>
                            </li>
                            <li>
                                <a class="{{$currentRoute == 'free-sms' ? 'active':''}}"  wire:navigate href="{{route('free-sms')}}">
                                    Free SMS
                                </a>
                            </li>
                            <li>
                                <a class="{{$currentRoute == 'pricing' ? 'active':''}}" wire:navigate href="{{route('pricing')}}"> Pricing </a>
                            </li>
                            <li>
                                <a class="{{$currentRoute == 'services' ? 'active':''}}" wire:navigate href="{{route('services')}}">
                                    Services
                                </a>
                            </li>
                            <li>
                                <a class="{{$currentRoute == 'contact-us' ? 'active':''}}" wire:navigate href="{{route('contact-us')}}">Contact</a>
                            </li>
                            @guest
                                @if(Route::has('login'))
                                    <li class="auth-btn">
                                        <a  wire:navigate class="login {{$currentRoute == 'login' ? 'active':''}}" href="{{route('login')}}">
                                            Login
                                        </a>
                                    </li>
                                @endif
                                @if(Route::has('register'))
                                    <li class="auth-btn">
                                        <a  wire:navigate
                                            class="signup {{$currentRoute == 'register' ? 'active':''}}"
                                            href="{{route('register')}}"
                                        >
                                            Signup
                                        </a>
                                    </li>
                                @endif
                            @endguest

                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
            </div>
        </div>
    </div>
</header>
