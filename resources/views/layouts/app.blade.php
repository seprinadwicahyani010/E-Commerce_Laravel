<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Montserrat:wght@500&family=Mulish&family=Playfair&family=Satisfy&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background-color: #fff
        }
            .navbar{
                background-color: #ffdddf
            }
            .nav-link{
                font-weight:bold;
                color:#57242E
            }
            </style>
</head>
<Body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm" >
            <div class="container-fluid" style="margin-left:60px; margin-right:60px;">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('images/krasa.png') }}" width="150" alt ="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav">
                    <li class="nav-item active" >
                            <a class="nav-link" href="{{ url('home') }}">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('skincare') }}">Skin Care</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('bodycare') }}">Body Care</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('haircare') }}">Hair Care</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <?php
                            $pesanan_utama = \App\Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
                            if(!empty($pesanan_utama))
                            {
                                $notif = \App\DetailPesanan::where('id_pesanan', $pesanan_utama->id)->count();
                            }
                            ?>
                            <a class="nav-link" href="{{ url('check-out') }}"> 
                                <i class="fa fa-shopping-cart" style="color:#57242E;"></i>
                                @if(!empty($notif))
                                <span class="badge badge-pill badge-danger">{{ $notif }}</span>
                                @endif
                            </a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:#57242E;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ url('history') }}">
                                        Riwayat Pemesanan
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
</Body>
</html>
