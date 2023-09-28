<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&family=Playball&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Mulish&family=Playfair&family=Satisfy&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('images/bgg.jpeg'); 
                background-size: cover;
                color: #636b6f;
                font-family: 'Libre Baskerville', serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                line-height: 0px;
                font-size: 50px;
            }

            p{
                font-family: 'Playball', cursive;
                color: #43141E;
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{ url('images/krasa.png') }}" class="rounded mx-auto d-block" width="600" alt="">
                    <p>True Beauty comes from within</p>
                </div>

            
            </div>
        </div>
    </body>
</html>
