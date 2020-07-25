$(document).ready(function(){
    var userAgent = window.navigator.userAgent;

    if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i)) {
        $('.player').hide()
    }
// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
    let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
    document.documentElement.style.setProperty('--vh', `${vh}px`);

// We listen to the resize event
    window.addEventListener('resize', () => {
        // We execute the same script as before
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    });
  $('.eye').click(function(){
    let input = $(this).siblings('input')
    input.attr('type') === 'password'? input.attr('type', 'text') : input.attr('type', 'password')
  });
  $('[data-auth]').on('click',function(e){
    e.preventDefault();
    console.log(this);
    let target = $(this).data('target')
    $(target).addClass('swipe')
    $('body').addClass( "open-modal" );
  });
  $('.overlay').on('click', function(){
    closeMenu()
    $('body').removeClass( "open-modal" );
    $('.popup').removeClass('show');
    $('.burger').removeClass('active')
    $('header').removeClass('menu-open')
  })
  $('.burger').on('click', function(){
    $(this).toggleClass('active')
    $('.menu').toggleClass( "swipe" );
    $('body').toggleClass( "open-modal" );
    $('header').toggleClass('menu-open')
  })
  $('.selectbox select').select2()

  $('.smile-panel .thumbs input[type=radio]').change(function(){
    $(this).parent('.thumbs').removeClass('opacity').siblings().removeClass('checked')
    if($(this).is(':checked')){
      $(this).parent('.thumbs').addClass('checked').siblings().addClass('opacity')
    }
  })
  $('.confirm-hospital a').last().on('click', function(e){
    e.preventDefault();
    $('.hospital-search').addClass('disabled');
  })
    $('.clearFiles').on('click', function(e){
        e.preventDefault();
        $('.fileUpload .thumbs').each(function(){
            $(this).find('input').val('')
            $(this).find('.preview').empty()
        })
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

function closeMenu(){
  $('body').removeClass( "open-modal" );
  $('.left-menu, .menu').removeClass( "swipe" );
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
    const  fileType = file[0]['type'];
    console.log(fileType);
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];
    var img = document.createElement('img');
    if (!validImageTypes.includes(fileType)) {
        $('.alert.error.type').fadeIn();
        setTimeout(()=>{
            $('.alert.error.type').fadeOut();
        }, 2000);
        return false;
        // invalid file type code goes here.
    }
    else {
        img.setAttribute('src', url)
        if (file[0].size > 5242880) {
            $('.alert.error.size').fadeIn();
            setTimeout(() => {
                $('.alert.error.size').fadeOut();
            }, 2000);
            return false;
        }
    }

    $(el).parents(parent).find('.preview').addClass('active')
  $(el).parent().addClass('active')
  $(el).parents(parent).find('.preview').empty().prepend(img);
}
function setIntervalTime() {
    var timer2 = $(".timer").text();
    var interval = setInterval(function() {
        var timer = timer2.split(':');
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
        if(minutes < 0 && seconds <=0) return false;
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        $(element).html(hour + ':' + minutes + ':' + seconds);
        timer2 = hour + ':' + minutes + ':' + seconds;
        if (seconds <= 0) return false;
    }, 1000);
}


$(".lang-switcher").click(function () {
    $("#lang").addClass("show")
});




