@extends("frontend.layout")
@section("title", " — Авторизация")
@section("content")
    @include("errors")
    <div class="auth-page full">
        <form method="POST" id="loginForm" action="{{ route('login') }}" autocomplete="off">
            @csrf
            <div class="top">
                <h1>{{__("box.authorize")}}</h1>
                <p>{{__("box.auth_paragraph")}}</p>
                <div class="input-thumbs">
                    <label>{{__("box.mobile_tel_num")}}</label>
                    <div class="input">
                        <div class="helper">+998</div>
                        <input type="tel"  id="phone" value=""  placeholder="{{__("box.mobile_num")}}" autocomplete="off"/>
                        <input type="text" name="phone" hidden/>
                    </div>
                </div>
                <div class="input-thumbs">
                    <label>{{__("box.password")}}</label>
                    <input type="password" value="" name="password" placeholder="{{__("box.enter_password")}}"/>
                    <i class="eye">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 11.75C6.06271 11.75 4.00451 10.5827 2.37694 8C4.00451 5.41731 6.06271 4.25 8 4.25C9.93729 4.25 11.9955 5.41731 13.6231 8C11.9955 10.5827 9.93729 11.75 8 11.75ZM15.1478 7.6221C13.3086 4.46908 10.7206 2.75 8 2.75C5.27937 2.75 2.69142 4.46908 0.852166 7.62209C0.715945 7.85562 0.715945 8.14438 0.852166 8.3779C2.69142 11.5309 5.27937 13.25 8 13.25C10.7206 13.25 13.3086 11.5309 15.1478 8.3779C15.2841 8.14438 15.2841 7.85562 15.1478 7.6221ZM8 11C9.65685 11 11 9.65685 11 8C11 6.34315 9.65685 5 8 5C6.34315 5 5 6.34315 5 8C5 9.65685 6.34315 11 8 11Z" fill="#B2B7D0"/>
                        </svg>
                    </i>
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
        <script src="{{ asset("assets/js/jquery.maskedinput.js") }}"></script>

        <script>
            $(function () {
                $('#phone').mask('(99)999-9999',{
                    placeholder:'_'
                });
            });
            // $("#phone").mask("(99)999-9999");

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
