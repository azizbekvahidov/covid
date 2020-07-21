$(document).ready(function(){

  $('.overlay').on('click', function(){
    closeMenu();
    $('.popup').removeClass('show')
  })
  $('.burger').on('click', function(){
    openMenu()
  })
  $('.selectbox select').select2()
  
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
  console.log(file);
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
  if(file[0].type.includes('image')){
    $(el).siblings('.preview').addClass('active')
    $(el).parent().addClass('active')
    $(el).siblings('.preview').prepend(img);

  }else{
    $('.alert').toggle();
    setTimeout(()=>{
      $('.alert').toggle();
      $(this).val('')
    }, 5000);
    return false;
  }
}
function setIntervalTime() {
    var timer2 = $(".timer").text();
    var interval = setInterval(function() {
        var timer = timer2.split(':');
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 1 && seconds < 1) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        $('.timer').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
    }, 1000);
}

