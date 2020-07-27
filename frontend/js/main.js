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

  var timer2 = "3:00";
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
    if(seconds <= 0) return false
  }, 1000);
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
  var img = document.createElement('img')
  img.setAttribute('src', url)
  $(el).parents(parent).find('.preview').addClass('active')
  $(el).parent().addClass('active')
  $(el).parents(parent).find('.preview').empty().prepend(img);
}
function handleMask(event, mask) {
    with (event) {
        stopPropagation()
        preventDefault()
        if (!charCode) return
        var c = String.fromCharCode(charCode)
        if (c.match(/\D/)) return
        with (target) {
            var val = value.substring(0, selectionStart) + c + value.substr(selectionEnd)
            var pos = selectionStart + 1
        }
    }
    var nan = count(val, /\D/, pos)
    val = val.replace(/\D/g,'')

    var mask = mask.match(/^(\D*)(.+9)(\D*)$/)
    if (!mask) return // meglio exception?
    if (val.length > count(mask[2], /9/)) return

    for (var txt='', im=0, iv=0; im<mask[2].length && iv<val.length; im+=1) {
        var c = mask[2].charAt(im)
        txt += c.match(/\D/) ? c : val.charAt(iv++)
    }

    with (event.target) {
        value = mask[1] + txt + mask[3]
        selectionStart = selectionEnd = pos + (pos==1 ? mask[1].length : count(value, /\D/, pos) - nan)
    }

    function count(str, c, e) {
        e = e || str.length
        for (var n=0, i=0; i<e; i+=1) if (str.charAt(i).match(c)) n+=1
        return n
    }
}
