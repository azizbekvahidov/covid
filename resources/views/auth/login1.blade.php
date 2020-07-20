@extends("frontend.layout")
@section("title", " — Авторизация")
@section("content")
    <div class="auth-page full">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="top">
                <h1>Авторизоваться</h1>
                <p>Войдите чтобы сообщить о проблеме и оценить мед учереждение</p>
                <div class="input-thumbs">
                    <label>Номер мобильного телефона</label>
                    <div class="input">
                        <div class="helper">+998</div>
                        <input type="text" onkeypress="onlyNumber(event)"  maxlength="7" value="" name="" placeholder="Мобильный номер"/>
                    </div>
                </div>
                <div class="input-thumbs">
                    <label>Пароль</label>
                    <input type="password" value="" name="" placeholder="Введите пароль"/>
                </div>
                <a href="#" class="recover-password">Забыли пароль?</a>
            </div>
            <div class="bottom">
                <button type="submit">Войти</button>
                <div class="form-text">
                    <span class="helper-text">У вас еще нет аккаунта?</span>
                    <a href="#" class="registration-link">Зарегистрируйтесь.</a>
                </div>
            </div>
        </form>
    </div>
@endsection
