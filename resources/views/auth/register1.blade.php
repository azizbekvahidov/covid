@extends("frontend.layout")
@section("title", " — Регистрация")
@section("content")
    <div class="auth-page">
            <div class="top">
                <h1>Регистрация</h1>
                <p>Зарегистрируйтесь чтобы оценить мед учереждении</p>
                <form autocomplete="off" id="phoneForm">
                    @csrf
                    <div class="input-thumbs">
                        <label>Номер мобильного телефона</label>
                        <div class="input">
                            <div class="helper">+998</div>
                            <input type="tel" required name="phone" id="phone" placeholder="Мобильный номер"/>
                        </div>
                    </div>
                    <button type="button" id="sendSMS">{{ __('getSMS') }}</button>
                </form>

                <form  autocomplete="off" id="verifyForm">
                    @csrf
                    <div class="input-thumbs">
                        <label>Код подтверждения</label>
                        <input type="text" onkeypress="onlyNumber(event)" required id="verifyCode" name="verifyCode" placeholder="Введите код"/>
                        <span class="timer">03:00</span>
                    </div>
                    <span class="checkbox">
                        <label for="some" hidden></label>
                      <input type="checkbox" id="some" value="on" name="">
                      <i>
                        <svg width="28" height="30" viewBox="0 0 28 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M2 15C2 8.37258 7.37258 3 14 3C20.6274 3 26 8.37258 26 15C26 21.6274 20.6274 27 14 27C7.37258 27 2 21.6274 2 15Z" fill="#0085FF"/>
                          <path d="M12.5535 17.5593L19.0048 10.8045C19.3926 10.3985 20.0213 10.3985 20.4091 10.8045C20.7969 11.2105 20.7969 11.8689 20.4091 12.2749L12.5535 20.5L7.99079 15.7227C7.603 15.3167 7.603 14.6584 7.99079 14.2524C8.37858 13.8464 9.00731 13.8464 9.3951 14.2524L12.5535 17.5593Z" fill="white"/>
                        </svg>
                      </i>
                      <span>
                        Я ознакомился и согласен с условиями <a href="#">публичной оферты</a>
                      </span>
                    </span>
                    <div class="bottom">
                        <button type="submit">Подтвердить</button>
                        <div class="form-text">
                            <span class="helper-text">У вас имеется аккаунт?</span>
                            <a href="{{ route("login") }}" class="registration-link">Войти</a>
                        </div>
                    </div>
                </form>

    </div>
@endsection
@section("js")
    <!-- Подключение jQuery плагина Masked Input -->
    <script src="{{ asset("js/jquery.maskedinput.min.js") }}"></script>
    <script>
        var userID;
        $("#sendSMS").click(function () {
            $.ajax({
                url: "api/sendMessage",
                type: "POST",
                data: $("#phoneForm").serialize(),
                success: function (data) {
                    userID = data.message;
                }

            });
        });
        $("#verifyBtn").click(function () {
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
