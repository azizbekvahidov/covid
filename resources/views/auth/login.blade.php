@extends("frontend.layout")
@section("title", " — Авторизация")
@section("content")
    @include("errors")
    <div class="auth-page full">
        {{session()->get("message")}}
        <?php
            session()->forget("message");
        ?>
        <form method="POST" id="loginForm" action="{{ route('login') }}">
            @csrf
            <div class="top">
                <h1>{{__("box.authorize")}}</h1>
                {{--                <p>Войдите чтобы сообщить о проблеме и оценить мед учереждение</p>--}}
                <p>{{__("box.auth_paragraph")}}</p>
                <div class="input-thumbs">
                    <label>{{__("box.mobile_tel_num")}}</label>
                    <div class="input">
                        <div class="helper">+998</div>
                        <input type="tel" onkeypress="onlyNumber(event)" id="phone" value="{{session()->get("phone")}}" maxlength="9" placeholder="{{__("box.mobile_num")}}"/>
                        <input type="text" name="phone" hidden/>
                    </div>
<?php
    session()->forget("phone");
?>
                </div>
                <div class="input-thumbs">
                    <label>{{__("box.password")}}</label>
                    <input type="password" value="" name="password" placeholder="{{__("box.enter_password")}}"/>
                </div>
                <a href="#" class="recover-password">{{__("box.forgot_password")}}?</a>
            </div>
            <div class="bottom">
                <button type="submit">{{__("box.login")}}</button>
                <div class="form-text">
                    <span class="helper-text">{{__("box.do_not_have_account")}}?</span>
                    <a href="{{route("register.verifyPhone")}}" class="registration-link">{{__("box.register")}}.</a>
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

        // $("#phone").on("change", function () {
        //     $("input[name=phone]").val("998"+$(this).val());
        // });
    </script>
@endsection
