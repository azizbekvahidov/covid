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
        // let audio = document.querySelector('#aud1');
        // if ("srcObject" in audio) {
        //     audio.srcObject = mediaStreamObj;
        // } else {
        //     //old version
        //     audio.src = window.URL.createObjectURL(mediaStreamObj);
        // }
        //
        // audio.onloadedmetadata = function(ev) {
        //     //show in the video element what is being captured by the webcam
        //     // audio.play();
        // };

        //add listeners for saving video/audio
        let start = document.getElementById('btnStart');
        let audioInput = document.getElementById('audioInput');
        let del = document.getElementById('btnDel');
        let wave = document.getElementById('waveform');
        let isStart = false;
        // let vidSave = document.getElementById('aud2');
        let mediaRecorder = new MediaRecorder(mediaStreamObj);
        let chunks = [];
        start.addEventListener('click', (ev)=>{
            if(isStart){
                mediaRecorder.stop();
                this.text = "start";
                isStart = false;
            }
            else{
                mediaRecorder.start();
                this.text = "stop";
                isStart = true;
            }
            // console.log(ec);
        });
        del.addEventListener('click', (ev)=>{
            wavesurfer.empty();
            audioInput.value("");
            // console.log(mediaRecorder.state);
        });

        wave.addEventListener("click",(ev)=>{
            wavesurfer.playPause();
            // console.log(mediaRecorder.state);
        });

        mediaRecorder.ondataavailable = function(ev) {
            chunks.push(ev.data);
        }
        mediaRecorder.onstop = (ev)=>{
            let blob = new Blob(chunks, { 'type' : 'audio/mp3;' });
            chunks = [];
            let audioURL = window.URL.createObjectURL(blob);
            // vidSave.src = audioURL;
            wavesurfer.load(audioURL);
            audioInput.value = audioURL;
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
