<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cleartype" content="on">
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <meta name="theme-color" content="#007BEC">
    <meta name="description" content="">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/select2.css")}}">
    <script src="{{ asset("js/wavesurfer.js") }}"></script>
    @yield("css")
    <style>
        #logout-btn {
            border: none;
            background-color: inherit;
            cursor: pointer;
        }
        #logout-btn {
            outline: none;
        }
        .logout-text {
            background:#0085FF;
            border:0.26666667vw solid #ffffff;
            padding:3.2vw 5.33333333vw;
            margin-bottom:4vw;
            color:#ffffff;
            font-weight:500;
            font-size:3.73333333vw;
            line-height:4.26666667vw;
            text-decoration:none;
            text-align:center;
            border-radius:5.33333333vw;
            -webkit-box-sizing:border-box;
            box-sizing:border-box;
            display:inline-block;
        }
        .buttons a:first-child{
            border:0.26666667vw solid #000000;
            padding:3.2vw 5.33333333vw;
            margin-bottom:4vw;
            color:#000000;
         }
        .buttons a:last-child{
            background:#0085FF;
            padding:3.2vw 18.4vw 3.2vw 18.93333333vw;
            color:#FFFFFF;
        }

    </style>
    <title>Sogboling.uz @yield("title")</title>
</head>
<body>
<div class="wrapper">
    @include("frontend.partials.header")
    <div class="content">
        @yield("content")
    </div>
    @yield("footer")
</div>

<div class="left-menu">
    <div class="overlay"></div>
    <div class="menu-content">
@if(!\Auth::user())
            <a href="{{route("register.verifyPhone")}}">{{__("box.register")}}</a>
            <a href="{{route("login")}}">{{__("box.login")}}</a>
@else
            <form action="/logout" method="post">
                @csrf
                <button type="submit" id="logout-btn">
                    <p class="logout-text">{{__("box.logout")}}</p>
                </button>
            </form>
@endif

    </div>
</div>

<script src="/assets/js/jquery-3.2.1.min.js"></script>
{{--<script src="/assets/js/jquery.mobile-1.4.5.min.js"></script>--}}
<script src="/assets/js/main.js"></script>
<script src="/assets/js/select2.js"></script>
@yield("js")
</body>
</html>
