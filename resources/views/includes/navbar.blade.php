<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="{{ url('frontend/assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li @if (Route::is('home')) class="active" @endif><a href="{{ route('home') }}">Home</a></li>
                                            <li @if (Route::is('kursus.*')) class="active" @endif><a href="{{ route('kursus.index') }}">Kursus</a></li>
                                            <li @if (Route::is('grup-belajar.*') || Route::is('grup-belajar-pengumuman.*')) class="active" @endif><a href="{{ route('grup-belajar.index') }}">Grup Belajar</a></li>
                                            <li @if (Route::is('lokakarya.*')) class="active" @endif><a href="{{ route('lokakarya.index') }}">Lokakarya</a></li>
                                            <li @if (Route::is('jadwal.*')) class="active" @endif><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
                                            <li @if (Route::is('about')) class="active" @endif><a href="{{ route('about') }}">Tentang</a></li>
                                            <li @if (Route::is('Blogg') || Route::is('Blog-show')) class="active" @endif><a href="{{ route('Blogg') }}">Blog</a></li>
                                            @if (Auth::user() && Auth::user()->role == 'ADMIN')
                                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                            @endif
                                            @if (Auth::user())
                                            <li class="button-header">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="{{ route('logout') }}" class="btn btn-warning" onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ Auth::user()->nama }}
                                                    </a>
                                                </form>
                                            </li>
                                            @else
                                            <!-- Button -->
                                            <li class="button-header"><a href="{{ route('register') }}" class="btn btn-primary">Gabung</a></li>
                                            <li class="button-header"><a href="{{ route('login') }}" class="btn btn-primary">Log in</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
