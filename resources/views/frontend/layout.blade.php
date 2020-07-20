<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cleartype" content="on">
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <meta name="theme-color" content="#007BEC">
    <meta name="description" content="">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/css/style.css">
    @yield("css")
    <title>Sogboling.uz @yield("title")</title>
</head>
<body>
<div class="wrapper">
    @include("frontend.partials.header")
    <div class="content">
        @yield("content")
    </div>
    @include("frontend.partials.footer")
</div>
@if(!\Auth::user())
<div class="left-menu">
    <div class="overlay"></div>
    <div class="menu-content">
        <a href="#">Зарегистрироваться</a>
        <a href="#">Войти</a>
    </div>
</div>
@else

@endif
<script src="/assets/js/jquery-3.2.1.min.js"></script>
<script src="/assets/js/jquery.mobile-1.4.5.min.js"></script>
<script src="/assets/js/main.js"></script>
@yield("js")
</body>
</html>
