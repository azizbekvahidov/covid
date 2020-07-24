$(document).ready(function(){
    $('.eye').click(function(){
        let input = $(this).siblings('input')
        input.attr('type') === 'password'? input.attr('type', 'text') : input.attr('type', 'password')
    });
    $('.overlay').on('click', function(){
        closeMenu();
        $('.popup').removeClass('show')
    })
    $('.burger').on('click', function(){
        openMenu()
    })
    $('.selectbox select').select2()

    $('.smile-panel .thumbs input[type=radio]').change(function(){
        $(this).parent('.thumbs').removeClass('opacity').siblings().removeClass('checked')
        if($(this).is(':checked')){
            $(this).parent('.thumbs').addClass('checked').siblings().addClass('opacity')
        }
    })
})
function onlyNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if(key < 48 || key > 57){
        event.preventDefault();
    }
}
function onlyLetters(event) {
    if(!/[^0-9-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]+$/.test(event.target.value)){
        event.target.value = event.target.value.replace(/[0-9-!$@%#^&*()_+|~=`{}\[\]:";'<>?,.\/]/g, '')
    }
}
function openMenu(){
    $('.left-menu').addClass( "swipe" );
}
function closeMenu(){
    $('.left-menu').removeClass( "swipe" );
}
function createObjectURL ( file ) {
    if ( window.webkitURL ) {
        return window.webkitURL.createObjectURL( file );
    } else if ( window.URL && window.URL.createObjectURL ) {
        return window.URL.createObjectURL( file );
    } else {
        return null;
    }
}
function fileCHeck(el){
    let file = $(el)[0].files;
    let parent = $(el).data('target');
    var url = createObjectURL(file[0]);
    var img = document.createElement('img')
    img.setAttribute('src', url)
    if(file[0].size > 5242880){
        $('.alert.error').fadeIn();
        setTimeout(()=>{
            $('.alert.error').fadeOut();
        }, 2000);
        return false;
    }

    $(el).parents(parent).find('.preview').addClass('active')
  $(el).parent().addClass('active')
  $(el).parents(parent).find('.preview').empty().prepend(img);
}
function setIntervalTime() {
    var timer2 = $(".timer").text();
    var interval = setInterval(function() {
        var timer = timer2.split(':');
        console.log(timer);
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0 && seconds <= 0) return false;
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        $('.timer').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
        if (seconds <= 0) return false;
    }, 1000);
}

function timer(element){
    var timer2 = $(element).text();
    var interval = setInterval(function() {
        var timer = timer2.split(':');
        var hour    = parseInt(timer[0], 10);
        var minutes = parseInt(timer[1], 10);
        var seconds = parseInt(timer[2], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        hour = (minutes < 0) ? --hour : hour;
        if (hour < 0 && minutes <= 0 && seconds <= 0) return false;
        minutes = (minutes < 0) ? 59 : minutes;
        minutes = (minutes < 10) ? '0' + minutes : minutes;
        console.log(hour+"=>"+minutes+"=>"+seconds);
        if(minutes < 0 && seconds <=0) return false;
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        $(element).html(hour + ':' + minutes + ':' + seconds);
        timer2 = hour + ':' + minutes + ':' + seconds;
        if (seconds <= 0) return false;
    }, 1000);
}



