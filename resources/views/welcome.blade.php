<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Minat Bakat UI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Titillium+Web" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/animate.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">

        <!-- Script -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
    </head>
    <body>
        <!-- <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ route('dashboard') }}">dashboard</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
        </div> -->

        <div class="content text-center m-b-md">
            <div class="title title-small-1">Selamat Datang</div>
            <div class="title title-small-2">di Laman Web</div>
            <div class="title title-big">
                MINAT BAKAT UI
            </div>
        </div>

        

        <div class="sect row position-abs" style="width: 100%">
            <div class="invis"></div>
            <a href="/senbud" id="senbud" class="sect col-xs-4">
                <div class="td-grad"></div>
                <div class="t-box flex-center position-ref rotate" style="background-color: #ff414d">
                    Seni dan Budaya
                </div>
            </a>
            <a href="/pnk" id="pnk" class="sect col-xs-4">
                <div class="td-grad gone"></div>
                <div class="t-box flex-center position-ref rotate" style="background-color: #fddf01">
                    Pendidikan dan Keilmuan
                </div>
            </a>
            <a href="depor" id="depor" class="sect col-xs-4">
                <div class="td-grad gone"></div>
                <div class="t-box flex-center position-ref rotate" style="background-color: #1aa6b7">
                    Olahraga
                </div>
            </a>
        </div>
    </body>
</html>
