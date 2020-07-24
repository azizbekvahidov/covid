let recordRTC;
let pre = document.querySelector('pre');
let recorder;
let context;
var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
var timer;
var clicked = 0;

window.URL = window.URL || window.webkitURL;
/**
 * Detecte the correct AudioContext for the browser
 * */
window.AudioContext = window.AudioContext || window.webkitAudioContext;
navigator.getUserMedia  = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

let onFail = function(e) {
    alert('Error '+e);
    console.log('Rejected!', e);
};
let record = function(audioStream) {
    console.log('Recordin...');
    recordRTC = RecordRTC(audioStream, {recorderType: StereoAudioRecorder});
    recordRTC.startRecording();
}

let onSuccess = function(s) {
    console.log('Recording...');
    let tracks = s.getTracks();
    context = new AudioContext();
    let mediaStreamSource = context.createMediaStreamSource(s);
    recorder = new Recorder(mediaStreamSource);
    recorder.record();
}

function startRecord(el){
    $(el).parent('.thumbs').addClass('active').removeClass('unactive')
    $('.delay').show();
    timer = setInterval(setTime, 1000);
}
function stopRecord(el){
    $(el).parent('.thumbs').removeClass('active').addClass('stop')
    $(el).parent('.thumbs').find('.record').toggle()
    $(el).parent('.thumbs').find('.playingbutton').toggle()
    console.log('Stop Recording...');
    clearInterval(timer)
}
function refreshRecord(el){
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

