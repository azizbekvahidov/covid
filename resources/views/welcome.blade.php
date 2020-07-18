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
    <div id="map"></div>
    <p><button id="btnStart">START RECORDING</button><br/>
        <button id="btnStop">STOP RECORDING</button></p>

    <audio hidden id="aud1" controls></audio>

    <audio id="aud2" controls></audio>

    <!-- could save to canvas and do image manipulation and saving too -->
</main>
<script src="{{ asset('js/map.js') }}" defer></script>
<script>

    let constraintObj = {
        audio: true,
        video: false
    };
    // width: 1280, height: 720  -- preference only
    // facingMode: {exact: "user"}
    // facingMode: "environment"

    //handle older browsers that might implement getUserMedia in some way
    if (navigator.mediaDevices === undefined) {
        navigator.mediaDevices = {};
        navigator.mediaDevices.getUserMedia = function(constraintObj) {
            let getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
            if (!getUserMedia) {
                return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
            }
            return new Promise(function(resolve, reject) {
                getUserMedia.call(navigator, constraintObj, resolve, reject);
            });
        }
    }else{
        navigator.mediaDevices.enumerateDevices()
            .then(devices => {
                devices.forEach(device=>{
                    console.log(device.kind.toUpperCase(), device.label);
                    //, device.deviceId
                })
            })
            .catch(err=>{
                console.log(err.name, err.message);
            })
    }

    navigator.mediaDevices.getUserMedia(constraintObj)
        .then(function(mediaStreamObj) {
            //connect the media stream to the first video element
            let audio = document.querySelector('#aud1');
            if ("srcObject" in audio) {
                audio.srcObject = mediaStreamObj;
            } else {
                //old version
                audio.src = window.URL.createObjectURL(mediaStreamObj);
            }

            audio.onloadedmetadata = function(ev) {
                //show in the video element what is being captured by the webcam
                // audio.play();
            };

            //add listeners for saving video/audio
            let start = document.getElementById('btnStart');
            let stop = document.getElementById('btnStop');
            let vidSave = document.getElementById('aud2');
            let mediaRecorder = new MediaRecorder(mediaStreamObj);
            let chunks = [];

            start.addEventListener('click', (ev)=>{
                mediaRecorder.start();
                // console.log(mediaRecorder.state);
            })
            stop.addEventListener('click', (ev)=>{
                mediaRecorder.stop();
                // console.log(mediaRecorder.state);
            });
            mediaRecorder.ondataavailable = function(ev) {
                chunks.push(ev.data);
            }
            mediaRecorder.onstop = (ev)=>{
                let blob = new Blob(chunks, { 'type' : 'audio/mp3;' });
                chunks = [];
                let videoURL = window.URL.createObjectURL(blob);
                vidSave.src = videoURL;
            }
        })
        .catch(function(err) {
            console.log(err.name, err.message);
        });

    /*********************************
     getUserMedia returns a Promise
     resolve - returns a MediaStream Object
     reject returns one of the following errors
     AbortError - generic unknown cause
     NotAllowedError (SecurityError) - user rejected permissions
     NotFoundError - missing media track
     NotReadableError - user permissions given but hardware/OS error
     OverconstrainedError - constraint video settings preventing
     TypeError - audio: false, video: false
     *********************************/
</script>
</body>
</html>
