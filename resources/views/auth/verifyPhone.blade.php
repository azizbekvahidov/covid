<!-- Подключение библиотеки jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Подключение jQuery плагина Masked Input -->
<script src="{{ asset("js/jquery.maskedinput.min.js") }}"></script>
<h1{{ __('Регистрация') }}></h1>
<form autocomplete="off" id="phoneForm">
    @csrf
    <label for="">{{ __('phoneNumber') }}</label><br>
+998<input type="tel" required name="phone" id="phone" >
    <button type="button" id="sendSMS">{{ __('getSMS') }}</button>
</form>
<form  autocomplete="off" id="verifyForm">
    @csrf
    <label for="">{{ __('VerifyCode') }}</label><br>
    <input type="tel" required id="verifyCode" name="verifyCode">
    <button type="button" id="verifyBtn">{{ __('verifyBtn') }}</button>
</form>
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
