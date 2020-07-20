$(document).ready(function(){
  $(document).on( "swipeleft", function(){
    openMenu()
  });
  $(document).on( "swiperight", function(){
    closeMenu()
  });
  $('.overlay').on('click', function(){
    closeMenu()
  })
  $('.burger').on('click', function(){
    openMenu()
  })
  function openMenu(){
    $('.left-menu').addClass( "swipe" );
  }
  function closeMenu(){
    $('.left-menu').removeClass( "swipe" );
  }
  var timer2 = "3:00";
  var interval = setInterval(function() {
    var timer = timer2.split(':');
    var minutes = parseInt(timer[0], 10);
    var seconds = parseInt(timer[1], 10);
    --seconds;
    minutes = (seconds < 0) ? --minutes : minutes;
    if (minutes < 0) clearInterval(interval);
    seconds = (seconds < 0) ? 59 : seconds;
    seconds = (seconds < 10) ? '0' + seconds : seconds;
    $('.timer').html(minutes + ':' + seconds);
    timer2 = minutes + ':' + seconds;
  }, 1000);
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
  var key = window.event ? event.keyCode : event.which;
  if((key < 48 || key <= 57 || key === 63|| key === 92|| key === 124|| key === 58|| key === 123|| key === 125 ||key === 64 || key === 94 || key === 95|| key === 126)){
    event.preventDefault();
  }

}
