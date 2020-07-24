<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cleartype" content="on">
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="initial-scale=1">
    <meta name="description" content="">
    <meta charset="UTF-8">
    <title>Sogboling.uz</title>
    <link rel="stylesheet" href="/assets/admin/css/select2.css">
    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <link rel="stylesheet" href="/assets/admin/css/media.css">
    @yield("css")
</head>
<body>
<div class="wrapper">
    @include("admin.partials.header")
    @yield("content")
</div>
<script src="/assets/admin/js/jquery-3.2.1.min.js"></script>
<script src="/assets/admin/js/select2.js"></script>
<script src="/assets/admin/js/main.js"></script>
@yield("js")
</body>
</html>
