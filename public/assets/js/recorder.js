var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
var timer;
let isStart = false;
var wavesurfer = WaveSurfer.create({
    container: '#waveform',
    waveColor: 'lightskyblue',
    progressColor: 'skyblue',
    height: 27,
});
let constraintObj = {
    audio: true,
    video: false
};
navigator.mediaDevices.getUserMedia(constraintObj)
    .then(function (mediaStreamObj) {
        isPermissionRecord = true;
        let wave = document.getElementById('waveform');
        // let vidSave = document.getElementById('aud2');
        let mediaRecorder = new MediaRecorder(mediaStreamObj);
        let chunks = [];

        $(".recorder").bind('mousedown  touchstart', function(){
            mediaRecorder.start();
            $(this).parent('.thumbs').addClass('active').removeClass('unactive')
            $('.delay').show();
            timer = setInterval(setTime, 1000);
        }).bind('mouseup touchend', function(){
            mediaRecorder.stop();
            $(this).parent('.thumbs').removeClass('active').addClass('stop')
            $(this).parent('.thumbs').find('.record').toggle()
            $(this).parent('.thumbs').find('.playingbutton').toggle()
            console.log('Stop Recording...');
            clearInterval(timer)
        });



        mediaRecorder.ondataavailable = function (ev) {
            chunks.push(ev.data);
        }
        mediaRecorder.onstop = (ev) => {
            let blob = new Blob(chunks, {'type': 'audio/mp3;'});
            chunks = [];
            console.log(blob);
            let audioURL = window.URL.createObjectURL(blob);
            // vidSave.src = audioURL;
            wavesurfer.load(audioURL);
            sound = blob;
        }
    })
    .catch(function (err) {
        console.log(err.name, err.message);
    });

$("#btnStart").click(function () {
    if (isStart) {
        wavesurfer.pause();
        $(this).removeClass("active");
        isStart = false;
        clearInterval(timer);
    } else {
        wavesurfer.play();
        $(this).addClass("active");
        isStart = true;
        secondsLabel.innerHTML = '00';
        minutesLabel.innerHTML = '00';
        totalSeconds = 0;
        timer = setInterval(setTime, 1000);
    }
});
function refreshRecord(el){
    wavesurfer.empty();
    $(el).parent('.thumbs').removeClass('stop').addClass('unactive')
    $(el).parent('.thumbs').find('.record').toggle()
    $(el).parent('.thumbs').find('.playingbutton').toggle()
    $(el).parent('.thumbs').find('.delay').toggle()
    secondsLabel.innerHTML = '00';
    minutesLabel.innerHTML = '00';
    totalSeconds = 0;
    console.log('restarting...');
    clearInterval(timer)
}
function setTime()
{
    ++totalSeconds;
    secondsLabel.innerHTML = pad(totalSeconds%60);
    minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
}
function pad(val)
{
    var valString = val + "";
    if(valString.length < 2)
    {
        return "0" + valString;
    }
    else
    {
        return valString;
    }
}

