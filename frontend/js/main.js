$(document).ready(function(){
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
    $('.popup').removeClass('show')
  })
  $('.burger').on('click', function(){
    $(this).toggleClass('active')
    $('.menu').toggleClass( "swipe" );
    $('body').toggleClass( "open-modal" );
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
