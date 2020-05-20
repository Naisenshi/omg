<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
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
                left: 10px;
                top: 25px;
                font-size:25px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 80px;
            }

            img{
                text-align:center;
            }

            .border {
                padding-top:30px;
                padding-bottom:30px;
                padding-right:30px;
                padding-left:30px;
                border:1px solid gray;

            }
            body {
                padding-top:5px;
                
                padding-right:5px;
                padding-left:5px;
            }
            .m-b-md {
                margin-bottom: 30px;
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

        <div class="border">
            <div class="content">
                <div class="title m-b-md">
                    Land Transportation Office
                </div>

            <div class ="front">
            @if (Route::has('login'))
                
                    @auth
                        <a href="{{ url('/home') }}"><img src="img/front.png"></a>
                    @else
                    <img src="img/front.png">
                        <a href="{{ route('login') }}"></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"></a>
                        @endif
                    @endauth
                
            @endif
            
            </div>
            </div>
        </div>
    </body>
</html>
