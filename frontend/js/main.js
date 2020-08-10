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
  $('#phone').mask('(99) 9999-999',{
    placeholder:'_'
  });
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
  $('.confirm-buttons a').last().on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    $('.hospital-list ul').show()
  })
  $('.clearFiles').on('click', function(e){
    e.preventDefault();
    $('.fileUpload .thumbs').each(function(){
      $(this).find('input').val('')
      $(this).find('.preview').empty()
    })
  })
  $(".header-search-panel form").click(function(e){
    e.stopPropagation();
  });

  $(document).click(function(){
    $('.hospital-list ul').hide()
    $('.header-search form').hide();
    $('.radio').removeClass('active');
    $('.lang-switcher ul ul').hide();
  });
  $('.header-search form').on('click', function(e){
    e.stopPropagation();
  });
  $('.header-search form .clear svg').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    $(this).parent().siblings('input').val('')
  })
  $('.radio').on('click', function(e){
    e.stopPropagation();
    $(this).addClass('active')
    $(this).siblings('ul').show();
  })
  $('.lang-switcher ul > li > .dropdown').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    $(this).siblings('ul').show();
  })
  $('.header-search a').off('click').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    $(this).siblings('form').show();
  })
  $('.hospital-list ul li').on('click', function(){
    const temp  = $(this).html()
    $(this).parents('ul').siblings('.radio').find('#main').empty().html(temp);
  })
  if($(window).width() > 1200){
    $('.service-panel .item').off('click').on('click', function(){
      let src = $(this).data('img');
      $(this).siblings().removeClass('active');
      $(this).addClass('active');
      $(this).parents('.service-panel').find('img').attr('src', src);
    })
    $('.category-item').each(function(){
      let text = $(this).find('a').children('p').text();
      if(!/[а-яА-ЯЁё]/.test(text)){
        $(this).find('a').addClass('uz')
      }
    })
  }else if($(window).width() < 800){
    $('.service-panel .item').removeClass('active')
    $('.auth-page').removeClass('profile-edit')
  }

  $('.select-box select').select2()
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
  $(el).parents(parent).find('.preview').addClass('active')
  $(el).parent().addClass('active')
  if($(el).val() !== ''){
    var url = createObjectURL(file[0]);
    var img = document.createElement('img')
    img.setAttribute('src', url)
    $(el).parents(parent).find('.preview').empty().prepend(img);
  }else{
    $(el).parents(parent).find('.preview').empty()
  }
}
