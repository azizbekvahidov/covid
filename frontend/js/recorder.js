var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
var timer;
$(".recorder").bind('mousedown  touchstart', function(){
    $(this).parent('.thumbs').addClass('active').removeClass('unactive')
    $('.delay').show();
    timer = setInterval(setTime, 1000);
}).bind('mouseup touchend', function(){
    $(this).parent('.thumbs').removeClass('active').addClass('stop')
    $(this).parent('.thumbs').find('.record').toggle()
    $(this).parent('.thumbs').find('.playingbutton').toggle()
    console.log('Stop Recording...');
    clearInterval(timer)
});

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

