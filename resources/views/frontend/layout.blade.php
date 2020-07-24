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

<div class="left-menu ">
    <div class="overlay"></div>
    <div class="menu-content">
        <ul>

            @if(\Auth::user())
            <li>
                <div class="user">
                    <div class="img">
                        <img src="img/empty.svg" alt=""/>
                    </div>
                    <div class="info-profile">
                        <a href="#">Пулатов Мавлонбек</a>
                        <span class="tags">Персональное данные</span>
                    </div>
                </div>
            </li>
            @endif
            <li><a href="#">О проекте</a> </li>
            <li><a href="#">Личный кабинет</a> </li>
            <li><a href="#">Как оставить сообщение?</a> </li>
        </ul>
        <div class="action-button">
            <strong>Чтобы сообщить о проблеме войдите</strong>
            @if(!\Auth::user())
                <a href="{{ route("register") }}" class="registration">Зарегистрироваться</a>
                <a href="{{ route("login") }}" class="signin">Войти</a>
            @else
                <a href="/logout" class="logout">Выйти из аккаунта</a>
            @endif
        </div>
    </div>
</div>
{{--@else--}}

    <div class="left-menu bottom auth swipe">
        <div class="overlay"></div>
        <div class="menu-content">
            <div class="action-button">
                <strong>Чтобы сообщить о проблеме войдите</strong>
                <a href="registration.html" class="registration">Зарегистрироваться</a>
                <a href="auth.html" class="signin">Войти</a>
                <a href="auth.html" class="logout">Выйти из аккаунта</a>
            </div>
        </div>
    </div>
{{--@endif--}}
{{--<div class="left-menu">--}}
{{--    <div class="overlay"></div>--}}
{{--    <div class="menu-content">--}}
{{--            <a href="{{route("register.verifyPhone")}}">{{__("box.register")}}</a>--}}
{{--            <a href="{{route("login")}}">{{__("box.login")}}</a>--}}
{{--@else--}}
{{--            <form action="/logout" method="post">--}}
{{--                @csrf--}}
{{--                <button type="submit" id="logout-btn">--}}
{{--                    <p class="logout-text">{{__("box.logout")}}</p>--}}
{{--                </button>--}}
{{--            </form>--}}

{{--    </div>--}}
{{--</div>--}}

<script src="/assets/js/jquery-3.2.1.min.js"></script>
{{--<script src="/assets/js/jquery.mobile-1.4.5.min.js"></script>--}}
<script src="/assets/js/main.js"></script>
<script src="/assets/js/select2.js"></script>
@yield("js")
</body>
</html>
