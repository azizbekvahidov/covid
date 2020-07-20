@extends("frontend.layout")
@section("content")

    <div class="auth-page full">
        <form action="{{ route("register.savePassword",$id) }}" method="post" autocomplete="off">
            <div class="top">
                <h1 class="mb-30">Создайте пароль</h1>
                <div class="input-thumbs">
                    <label>Создайте пароль</label>
                    <input type="password" required id="pass" name="verifyCode" placeholder="Создайте пароль">
                    <i class="eye">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 11.75C6.06271 11.75 4.00451 10.5827 2.37694 8C4.00451 5.41731 6.06271 4.25 8 4.25C9.93729 4.25 11.9955 5.41731 13.6231 8C11.9955 10.5827 9.93729 11.75 8 11.75ZM15.1478 7.6221C13.3086 4.46908 10.7206 2.75 8 2.75C5.27937 2.75 2.69142 4.46908 0.852166 7.62209C0.715945 7.85562 0.715945 8.14438 0.852166 8.3779C2.69142 11.5309 5.27937 13.25 8 13.25C10.7206 13.25 13.3086 11.5309 15.1478 8.3779C15.2841 8.14438 15.2841 7.85562 15.1478 7.6221ZM8 11C9.65685 11 11 9.65685 11 8C11 6.34315 9.65685 5 8 5C6.34315 5 5 6.34315 5 8C5 9.65685 6.34315 11 8 11Z" fill="#B2B7D0"/>
                        </svg>
                    </i>
                </div>
                <div class="input-thumbs">
                    <label>Подтвердить пароль</label>
                    <input type="password" required id="repass" name="verifyCode" placeholder="Подтвердитm пароль">
                    <i class="eye">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 11.75C6.06271 11.75 4.00451 10.5827 2.37694 8C4.00451 5.41731 6.06271 4.25 8 4.25C9.93729 4.25 11.9955 5.41731 13.6231 8C11.9955 10.5827 9.93729 11.75 8 11.75ZM15.1478 7.6221C13.3086 4.46908 10.7206 2.75 8 2.75C5.27937 2.75 2.69142 4.46908 0.852166 7.62209C0.715945 7.85562 0.715945 8.14438 0.852166 8.3779C2.69142 11.5309 5.27937 13.25 8 13.25C10.7206 13.25 13.3086 11.5309 15.1478 8.3779C15.2841 8.14438 15.2841 7.85562 15.1478 7.6221ZM8 11C9.65685 11 11 9.65685 11 8C11 6.34315 9.65685 5 8 5C6.34315 5 5 6.34315 5 8C5 9.65685 6.34315 11 8 11Z" fill="#B2B7D0"/>
                        </svg>
                    </i>
                </div>
                <div class="alert warning">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="9" r="9" fill="#FFC611"/>
                        <path d="M9 14C11.7614 14 14 11.7614 14 9C14 6.23858 11.7614 4 9 4C6.23858 4 4 6.23858 4 9C4 11.7614 6.23858 14 9 14Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 7V9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 11H9.005" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Пароль должен быть: не менее 8 символов
                </div>
            </div>
            <div class="bottom">
                <button type="submit" id="verifyBtn">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
@section("js")
    <script>
        $(document)
            .on('click', 'form button[type=submit]', function(e) {
                if($("#pass").val() != $("#repass").val() && ($("#repass").val() == "" || $("#repass").val() == "")){
                    e.preventDefault(); //prevent the default action
                }
                // var isValid = $(e.target).parents('form').isValid();
                // if(!isValid) {
                //     e.preventDefault(); //prevent the default action
                // }
            });
    </script>

@endsection
