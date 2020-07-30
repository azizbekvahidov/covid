$(document).ready(function(){
    var userAgent = window.navigator.userAgent;

    if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i)) {
        $('.player').hide();
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
    let input = $(this).siblings('input');
    input.attr('type') === 'password'? input.attr('type', 'text') : input.attr('type', 'password');
  });
  $('[data-auth]').on('click',function(e){
    e.preventDefault();
    console.log(this);
    let target = $(this).data('target');
    $(target).addClass('swipe');
    $('body').addClass( "open-modal" );
  });
  $('.overlay').on('click', function(){
    closeMenu();
    $('body').removeClass( "open-modal" );
    $('.popup').removeClass('show');
    $('.burger').removeClass('active');
    $('header').removeClass('menu-open');
  })
  $('.burger').on('click', function(){
    $(this).toggleClass('active');
    $('.menu').toggleClass( "swipe" );
    $('body').toggleClass( "open-modal" );
    $('header').toggleClass('menu-open');
  })
  $('.selectbox select').select2();

  $('.smile-panel .thumbs input[type=radio]').change(function(){
    $(this).parent('.thumbs').removeClass('opacity').siblings().removeClass('checked');
    if($(this).is(':checked')){
      $(this).parent('.thumbs').addClass('checked').siblings().addClass('opacity');
    }
  })
  // $('.confirm-hospital a').last().on('click', function(e){
  //   e.preventDefault();
  //   $('.hospital-search').addClass('disabled');
  // })
  $('.clearFiles').on('click', function(e){
    e.preventDefault();
    $('.fileUpload .thumbs').each(function(){
      $(this).find('input').val('');
      $(this).find('.preview').empty()
    })
  })
  $(".header-search-panel form").click(function(e){
    e.stopPropagation();
  });

  $(document).click(function(){
    $('.hospital-list ul').hide();
    $('#selectRadio').removeClass('active');
    openSelect = false;
  });
    var openSelect = false;
  $('#selectRadio').on('click', function(e){
    e.stopPropagation();
    console.log("click");
      if(openSelect){
          openSelect = false;
          $(this).siblings("ul").hide();
          $(this).removeClass('active');

      }
      else {
          $(this).addClass('active');
          $(this).siblings('ul').show();
          openSelect = true;
      }
  });

    $("#yesClinik").click(function () {
        locate = true;
        validate();
        checkValidate();
        // $(".confirm-hospital").attr("hidden","hidden");
    });
    $('.confirm-buttons a').last().on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        $('#selectRadio').addClass('active');
        $('.hospital-list ul').show()
    })
    $("#notClinik").click(function () {
        $("#locate").val("");
        $("#selected_place").attr("hidden","hidden");
        $("#select_place").removeAttr("hidden");
        // $('.radio').addClass('active');
        // $('.hospital-list ul').show();
        $(".selectbox").removeAttr("hidden");
        $(".confirm-hospital").attr("hidden","hidden");
        openSelect = true;

    });
  $('.hospital-list ul li').on('click', function(){
    const temp  = $(this).html();
    $(this).parent('ul').siblings('.radio').find('#select_main').empty().html(temp);
    let data = $(this).data("id");
    if(data != 0){
        $("#locate").val(data);
        validate();
        checkValidate();
    }
    else{
        $("#locate").val("");
        $("#select_place").attr("hidden","hidden");
        $(".confirm-hospital").attr("hidden","hidden");
        $("#no-clinic").removeAttr("hidden");
        validate();
        checkValidate();
    }

    console.log(data);
  });

  $('#phone').mask('(99)9999-999',{
    placeholder:'_'
  })
});
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
        event.target.value = event.target.value.replace(/[0-9-!$@%#^&*()_+|~=`{}\[\]:";'<>?,.\/]/g, '');
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
function fileCHeck(el,upload = false){
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
        img.setAttribute('src', url);
        if (file[0].size > 5242880) {
            $('.alert.error.size').fadeIn();
            setTimeout(() => {
                $('.alert.error.size').fadeOut();
            }, 2000);
            return false;
        }
    }

    $(el).parents(parent).find('.preview').addClass('active');
    $(el).parent().addClass('active');
    $(el).parents(parent).find('.preview').empty().prepend(img);
    if(upload)
        uploadFile(file,$(el).parents(parent).find('.preview'));
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

function uploadFile(fd,el){

    var input = document.createElement('input');
    input.setAttribute('type', "text");
    input.setAttribute('hidden', "text");
    input.setAttribute('name', "photo[]");
    console.log(el);
    var data = new FormData();
    data.append("photo", fd[0]);
    $.ajax({
        url: '/api/uploadImage',
        type: 'post',
        data: data,
        contentType: false,
        processData: false,
        success: function(response){
            input.setAttribute('value', response.message);
            $(el).prepend(input);
        },
    });
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
function getLocation(lat,long,lang) {
    $.ajax({
        url: "/api/getLocation",
        type: "GET",
        data: "lat="+lat+"&lng="+long+"&lang="+lang,
        success: function (data) {
            $("#selected_place").removeAttr('hidden');
            $("#locate").val(data.id);
            $("#selected_place #main>strong").text(data.place);
            $("#selected_place #main>p").text(data.region);
            $("#select_place #select_main>strong").text(data.place);
            $("#select_place #select_main>p").text(data.region);
            $(".confirm-hospital").removeAttr("hidden");
            $(".detect-by-location").attr("hidden","hidden");


        }
    });
}

function geoFindMe(lang) {
    function success(position) {

        const latitude  = position.coords.latitude;
        const longitude = position.coords.longitude;
        getLocation(latitude,longitude,lang);
    }

    function error() {
        console.log('Unable to retrieve your location');
        $(".detect-by-location").attr("hidden","hidden")
        $("#notClinik").click();
    }

    if(!navigator.geolocation) {
        alert('Geolocation is not supported by your browser');
        null;
    } else {
        console.log('Locating…');
        navigator.geolocation.getCurrentPosition(success, error);
    }

}
function validate(){
    //ratio validate
    $.each($(".rate"), function (e) {
        console.log($(this));
        if($(this).is(':checked')){
            ratio = true;
            return false;
        }
        else{
            ratio = false;
        }
    });
    // textarea validate
    if($("textarea").val() != ""){
        opinion = true;
    }
    else{
        opinion = false;
    }
    // location validate;
    if($("#locate").val() != ""){
        locate = true;
    }


    console.log("raio "+ratio);
    console.log("opinion "+opinion);
    console.log("locate "+locate);
    if(ratio && opinion && locate){
        $("#sendMood").removeAttr("disabled");
    }
    else {

        $("#sendMood").attr("disabled","disabled");
    }
}

$("#getCoordinate").click( function () {
    geoFindMe(lang);
    console.log("click geo");
});


