@extends("frontend.layout")
@section("title", " — Регистрация")
@section("content")
    <div class="auth-page">
        <div class="top">
            <h1>{{__("box.registration")}}</h1>
            <p>{{__("box.registration_paragraph")}}</p>
            <form autocomplete="off" id="phoneForm">
                @csrf
                <div class="alert warning hidden">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="9" r="9" fill="#FFC611"/>
                        <path d="M9 14C11.7614 14 14 11.7614 14 9C14 6.23858 11.7614 4 9 4C6.23858 4 4 6.23858 4 9C4 11.7614 6.23858 14 9 14Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 7V9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 11H9.005" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="alert-message"></span><br>
               </div>
                <div class="input-thumbs">
                    <label for="phone" id="phoneLabel">{{__("box.mobile_tel_num")}}</label>
                    <div class="input">
                        <div class="helper">+998</div>
                        <input type="tel" onkeypress="onlyNumber(event)" maxlength="9" required name="phone" value="{{old("phone")}}" id="phone" placeholder="{{__("box.mobile_num")}}"/>
                    </div>
                    <br><br><br>
                    <button type="button" id="sendSMS">{{ __('box.get_sms') }}</button>
                </div>
            </form>
            <form autocomplete="off" id="verifyForm">
                @csrf
                <div class="input-thumbs">
                    <label for="verifyCode" id="verifyCodeLabel">{{__("box.confirm_code")}}</label>
                    <input type="text" onkeypress="onlyNumber(event)" id="verifyCode" name="verifyCode" required placeholder="{{__("box.enter_code")}}" disabled/>
                    <span class="timer">03:00</span>
                </div>
                <span class="checkbox">
                      <input type="checkbox" value="on" name="" id="confirmCheckbox">
                      <label for="confirmCheckbox">
                          <i>
                            <svg width="28" height="30" viewBox="0 0 28 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M2 15C2 8.37258 7.37258 3 14 3C20.6274 3 26 8.37258 26 15C26 21.6274 20.6274 27 14 27C7.37258 27 2 21.6274 2 15Z" fill="#0085FF"/>
                              <path d="M12.5535 17.5593L19.0048 10.8045C19.3926 10.3985 20.0213 10.3985 20.4091 10.8045C20.7969 11.2105 20.7969 11.8689 20.4091 12.2749L12.5535 20.5L7.99079 15.7227C7.603 15.3167 7.603 14.6584 7.99079 14.2524C8.37858 13.8464 9.00731 13.8464 9.3951 14.2524L12.5535 17.5593Z" fill="white"/>
                            </svg>
                          </i>
                          <span>
                            {!! __("box.agreement_with_terms") !!}
                          </span>
                      </label>
                </span>
            </form>
        </div>
        <div class="bottom">
            <button type="submit" id="verifyBtn" disabled>{{__("box.confirm")}}</button>
            <div class="form-text">
                <span class="helper-text">У вас еще нет аккаунта?</span>
                <a href="{{route("login")}}" class="registration-link">{{__("box.login")}}</a>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <!-- Подключение jQuery плагина Masked Input -->
    <script src="{{ asset("js/jquery.maskedinput.min.js") }}"></script>
    <script>
        var userID;

        $("#sendSMS").click(function () {
            let thisBtn = $(this);
            if ($("#phone").val())
            $.ajax({
                url: "/sendMessage",
                type: "POST",
                data: $("#phoneForm").serialize(),
                success: function (data) {
                    if (data.message1 && data.message2) {
                        let text = data.message1 + " " + data.message2;
                        console.log(text);
                        $(".alert").removeClass("hidden");
                        $(".alert-message").text(text);
                        setTimeout(function () {
                            $(".alert").addClass("hidden");
                            $(".alert-message").text("");
                        },5000);

                    }
                    else if(data.status == "success") {
                        let id  = $("#verifyCodeLabel").attr('id'),
                            top = $("#"+id).offset().top;
                        $('body,html').animate({scrollTop: top}, 500);
                        userID = data.message;
                        setIntervalTime();
                        thisBtn.attr("disabled", "disabled");
                        $("#phone").attr("disabled", "disabled");
                        $("#verifyCode").removeAttr("disabled");
                        setTimeout(function () {
                            thisBtn.removeAttr("disabled");
                            $("#phone").removeAttr("disabled");
                            $("#verifyBtn").attr("disabled", "disabled");
                            $("#verifyCode").attr("disabled", "disabled");
                            $("#verifyCode").val("");
                            $(".timer").text("03:00");
                            id  = $("#phoneLabel").attr('id');
                            top = $("#"+id).offset().top;
                            $('body,html').animate({scrollTop: top}, 500);
                        },180000);
                    }
                }

            });
        });

        $("#confirmCheckbox").on("change", function () {
            console.log($("#verifyCode").val().length);
            if($(this).prop("checked") && $("#verifyCode").val().length == "6") {
                $("#verifyBtn").removeAttr("disabled");
            }
        });


        $("#verifyBtn").click(function () {
            console.log(userID);
            $.ajax({
                url: "api/verifyCode",
                type: "POST",
                data: $("#verifyForm").serialize()+"&id="+userID,
                success: function (data) {
                    if(data.message == 'verified'){

                        window.location.replace(userID+"/setPassword");
                    }else{

                    }
                }
            });
        });

        $(function(){
            //2. Получить элемент, к которому необходимо добавить маску
            $("#phone").mask("(99)999-9999");
        });

        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
@endsection
@section("css")
    <style>
        #verifyBtn {
            background:#0085FF;
            border-radius:6.66666667vw;
            display:block;
            width:100%;
            height:13.33333333vw;
            font-weight:500;
            font-size:4.8vw;
            line-height:5.86666667vw;
            cursor:pointer;
            letter-spacing:-0.044vw;
            border:none;
            margin-bottom:8vw;
            color:#FFFFFF;
        }
        .form-text {
            text-align:center
        }
        .helper-text {
            font-size:3.73333333vw;
            line-height:4.8vw;
            text-align:center;
            letter-spacing:-0.044vw;
            color:#000000;
            display:inline-block;
            margin-bottom:9.06666667vw;
            margin-right:2.4vw;
        }
        .registration-link {
            display:inline-block;
            font-weight:600;
            font-size:3.73333333vw;
            line-height:4.8vw;
            text-align:center;
            letter-spacing:-0.044vw;
            color:#0085FF;
            text-decoration:none;
        }
        .hidden {
            display: none!important;
        }
    </style>
@endsection
