
<h1{{ __('Регистрация') }}></h1>
<form action="{{ route("register.savePassword",$id) }}" method="post" autocomplete="off">
    @csrf
    <label for="">{{ __('password') }}</label><br>
    <input type="password" required id="pass" name="verifyCode">
    <br>
    <label for="">{{ __('repassword') }}</label><br>
    <input type="password" required id="repass" name="verifyCode">
    <button type="submit" id="verifyBtn">{{ __('save') }}</button>
</form>

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
