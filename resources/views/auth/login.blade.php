@extends("frontend.layout")
@section("title", " — Авторизация")
@section("content")
    @include("errors")
    <div class="auth-page full">
        <form method="POST" id="loginForm" action="{{ route('login') }}">
            @csrf
            <div class="top">
                <h1>{{__("box.authorize")}}</h1>
                <p>{{__("box.auth_paragraph")}}</p>
                <div class="input-thumbs">
                    <label>{{__("box.mobile_tel_num")}}</label>
                    <div class="input">
                        <div class="helper">+998</div>
                        <input type="tel" onkeypress="onlyNumber(event)" id="phone" value="" maxlength="9" placeholder="{{__("box.mobile_num")}}"/>
                        <input type="text" name="phone" hidden/>
                    </div>
                </div>
                <div class="input-thumbs">
                    <label>{{__("box.password")}}</label>
                    <input type="password" value="" name="password" placeholder="{{__("box.enter_password")}}"/>
                </div>
                <a href="javascript:;" class='reset-password'>{{__("box.forgot_password")}}</a>
                <br>
                <span class="timer">03:00</span>
            </div>
            <br><br><br>
            <div class="bottom">
                <button type="submit">{{__("box.login")}}</button>
                <div class="form-text">
                    <span class="helper-text">{{__("box.do_not_have_account")}}</span>
                    <a href="{{route("register.verifyPhone")}}" class="registration-link">{{__("box.register")}}</a>
                </div>
            </div>
        </form>
    </div>
@endsection
@section("js")
    <!-- Подключение jQuery плагина Masked Input -->
    <script src="{{ asset("js/jquery.maskedinput.min.js") }}"></script>

    <script>

        $(function(){
            //2. Получить элемент, к которому необходимо добавить маску
            $("#phone").mask("(99)999-9999");
        });
        $("#loginForm").submit(function (e) {
            var phone = $("#phone").val();
            phone = phone.replace(")","");
            phone = phone.replace("(","");
            phone = phone.replace("-","");
            $("input[name=phone]").val("998"+phone);
        });
        var active = true
        $(document).on("click", ".reset-password", function () {

            {{--var confirmation = confirm("{{__("box.ask_change_password")}}");--}}
            {{--if (confirmation) {--}}
                let data = {
                    "_token":  "{{csrf_token()}}",
                    "phone":   $("#phone").val(),
                };
                if(active)
                $.post("/api/resetPassword", data, function (response) {
                    if (response.status) {
                        active = false;
                        setIntervalTime();
                        setTimeout(function () {
                            active = true;
                            $(".timer").text("03:00");
                        },180000);
                        // window.location.replace("/login");
                    }
                    else {
                        alert("Error");
                    }
                });
            // }
        });

    </script>
@endsection
