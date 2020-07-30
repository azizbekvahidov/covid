var minutesLabel = $(".player:visible .minutes");
var secondsLabel = $(".player:visible .seconds");
var totalSeconds = 0;
var timer;
console.log(minutesLabel)
$(".recorder").bind('mousedown  touchstart', function(){
    $(this).parent('.thumbs').addClass('active').removeClass('unactive')
    $('.delay').show();
    timer = setInterval(setTime, 1000);
}).bind('mouseup touchend', function(){
    $(this).parents('.player').find('.thumbs').removeClass('active').addClass('stop')
    $(this).parents('.player').find('.thumbs').find('.record').toggle()
    $(this).parents('.player').find('.thumbs').find('.playingbutton').toggle()
    console.log('Stop Recording...');
    clearInterval(timer)
});

function refreshRecord(el){
    $(el).parents('.player').find('.thumbs').removeClass('stop').addClass('unactive')
    $(el).parents('.player').find('.thumbs').find('.record').toggle()
    $(el).parents('.player').find('.thumbs').find('.playingbutton').toggle()
    $(el).parents('.player').find('.thumbs').find('.delay').toggle()
    secondsLabel.innerHTML = '00';
    minutesLabel.innerHTML = '00';
    totalSeconds = 0;
    console.log('restarting...');
    clearInterval(timer)
}
function setTime()
{
    ++totalSeconds;
    secondsLabel.text(pad(totalSeconds%60));
    minutesLabel.text(pad(parseInt(totalSeconds/60)));
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

