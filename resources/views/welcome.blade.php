<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"><script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('js/app.js') }}">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey={{config("map")["map_apikey"]}}" type="text/javascript"></script>
</head>
<body>
<header>
</header>
<main>
    <button id="getMyLocation"> моя </button>
    <div id="map"></div>

       <p><button id="btnStart">START RECORDING</button><br/>
        <button id="btnStop">STOP RECORDING</button></p>

    <audio hidden id="aud1" controls></audio>

    <audio id="aud2" controls></audio>

    <!-- could save to canvas and do image manipulation and saving too -->
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('js/map.js') }}" defer></script>
<script src="{{ asset('js/voice.js') }}"></script>
</body>
</html>
