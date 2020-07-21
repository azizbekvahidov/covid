@extends("frontend.layout")
@section("title", " — Авторизация")
@section("content")
    <div class="auth-page full">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="top">
                <h1>{{__("box.authorize")}}</h1>
{{--                <p>Войдите чтобы сообщить о проблеме и оценить мед учереждение</p>--}}
                <p>{{__("box.auth_paragraph")}}</p>
                <div class="input-thumbs">
                    <label>{{__("mobile_phone_num")}}</label>
                    <div class="input">
                        <div class="helper">+998</div>
                        <input type="text" onkeypress="onlyNumber(event)"  maxlength="9" name="phone" placeholder="{{__("box.mobile_phone")}}"/>
                    </div>
                </div>
                <div class="input-thumbs">
                    <label>{{__("box.password")}}</label>
                    <input type="password" value="" name="" placeholder="{{__("box.enter_password")}}"/>
                </div>
                <a href="#" class="recover-password">{{__("box.forgot_password")}}?</a>
            </div>
            <div class="bottom">
                <button type="submit">{{__("box.login")}}</button>
                <div class="form-text">
                    <span class="helper-text">{{__("box.do_not_have_account")}}?</span>
                    <a href="#" class="registration-link">{{__("box.register")}}.</a>
                </div>
            </div>
        </form>
    </div>
@endsection
