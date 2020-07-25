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
    <link rel="stylesheet" href="{{asset("assets/css/dop.css")}}">
    <script src="{{ asset("js/wavesurfer.js") }}"></script>
    @yield("css")
    <title>Sogboling.uz</title>
</head>
<body>
<div class="wrapper">
    @include("frontend.partials.header")
    <div class="content">
        @yield("content")
    </div>
    @yield("footer")
</div>

<div class="left-menu menu">
    <div class="overlay"></div>
    <div class="menu-content">
        <ul>
            @if(\Auth::user())
            <li>
                <div class="user">
                    <div class="img">
                        <img src="{{ asset((\Auth::user()->photo == "" || \Auth::user()->photo == null) ? "assets/img/user-empty.png" : "storage/avatars/".\Auth::user()->photo) }}" alt=""/>
                    </div>
                    <div class="info-profile">
                        <a href="{{ route("survey.list") }}">{{\Auth::user()->FIO}}</a>
                        <a href="{{ route("survey.list") }}" class="tags">{{ __("box.personal_data") }}</a>
                    </div>
                </div>
            </li>
            @endif
            <li><a href="/about">{{ __("box.about_project") }}</a> </li>
            <li><a href="{{ route("survey.list") }}">{{ __("box.personal_cabinet") }}</a> </li>
            <li><a href="/signal">{{ __("box.how_to_post_message") }}</a> </li>
        </ul>
        <div class="action-button">
            @if(!\Auth::user())
            <a href="{{ route("register.verifyPhone") }}" class="registration">{{ __("box.register") }}</a>
            <a href="{{ route("login") }}" class="signin">{{ __("box.login") }}</a>
            @else
                <a href="/logout" class="logout">{{ __("box.logout") }}</a>
            @endif
        </div>
    </div>
</div>
{{--@else--}}


<div class="left-menu bottom auth ">
    <div class="overlay"></div>
    <div class="menu-content">
        <div class="action-button">
            <strong style="text-align: center">{{ __("box.auth_for_set_problem") }}</strong>
            @if(!\Auth::user())
            <a href="{{ route("register.verifyPhone") }}" class="registration">{{ __("box.register") }}</a>
            <a href="{{ route("login") }}" class="signin">{{ __("box.login") }}</a>
            @else
            <a href="/logout" class="logout">{{ __("box.logout") }}</a>
            @endif
        </div>
    </div>
</div>

<div class="popup " id="lang">
    <div class="overlay"></div>
    <div class="popup-content">
        <strong>Выберите язык сайта</strong>
        <div class="popup-buttons locales">
            <a href="/locale/uz" >O‘zbekcha</a>
            <a href="/locale/cyrillic_uz" >Узбекский</a>
            <a href="/locale/ru" >Русский</a>
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
