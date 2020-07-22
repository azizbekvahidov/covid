@extends("frontend.layout")
@section("content")
    <div class="auth-page">
        @include("errors")
        @include("message")
        <form action="{{route("user.update")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="top">
                <h1>{{__("box.personal_data")}}</h1>
                <div class="bordered">
                    <div class="input-thumbs">
                        <div class="fileUplload">
                            <div class="profile-image">
                                <input type="file"  onchange="fileCHeck(this)" value="" name="photo"/>
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1501 2.85001H10.1111H10.1111C9.02406 2.85 8.15339 2.84999 7.44962 2.90749C6.72695 2.96654 6.10139 3.09067 5.52554 3.38407C4.60355 3.85385 3.85395 4.60346 3.38417 5.52545C3.09076 6.1013 2.96663 6.72686 2.90758 7.44953C2.85008 8.1533 2.85009 9.02397 2.8501 10.111V10.1111V10.15V25.85V25.889C2.85009 26.976 2.85008 27.8467 2.90758 28.5505C2.94522 29.0111 3.0093 29.4323 3.1268 29.8263C3.19139 30.2082 3.28887 30.5272 3.43602 30.816C3.81951 31.5686 4.43143 32.1805 5.18408 32.564C5.47281 32.7111 5.79164 32.8086 6.17347 32.8732C6.56756 32.9908 6.98885 33.0549 7.44962 33.0925C8.15337 33.15 9.02402 33.15 10.1111 33.15H10.1111H10.1501H25.8501H25.889H25.8891C26.9762 33.15 27.8468 33.15 28.5506 33.0925C29.0114 33.0549 29.4327 32.9908 29.8269 32.8732C30.2086 32.8086 30.5273 32.7111 30.816 32.564C31.5687 32.1805 32.1806 31.5686 32.5641 30.816C32.7111 30.5274 32.8086 30.2087 32.8731 29.8271C32.9908 29.4329 33.0549 29.0114 33.0926 28.5505C33.1501 27.8467 33.1501 26.9761 33.1501 25.889V25.889V25.85V10.15V10.1111V10.111C33.1501 9.02393 33.1501 8.15328 33.0926 7.44953C33.0336 6.72686 32.9094 6.1013 32.616 5.52545C32.1462 4.60346 31.3966 3.85385 30.4747 3.38407C29.8988 3.09067 29.2732 2.96654 28.5506 2.90749C27.8468 2.84999 26.9761 2.85 25.8891 2.85001H25.889H25.8501H10.1501ZM31.3501 22.2553V10.15C31.3501 9.01505 31.3494 8.21796 31.2986 7.5961C31.2486 6.98475 31.1548 6.62244 31.0122 6.34264C30.715 5.75933 30.2408 5.28509 29.6575 4.98789C29.3777 4.84532 29.0154 4.75146 28.404 4.70151C27.7821 4.65071 26.9851 4.65001 25.8501 4.65001H10.1501C9.01514 4.65001 8.21805 4.65071 7.59619 4.70151C6.98484 4.75146 6.62253 4.84532 6.34273 4.98789C5.75943 5.28509 5.28519 5.75933 4.98798 6.34264C4.84541 6.62244 4.75156 6.98475 4.70161 7.5961C4.6508 8.21796 4.6501 9.01505 4.6501 10.15V25.85C4.6501 26.3899 4.65026 26.8533 4.65589 27.2578L9.72616 21.2928C10.5248 20.3532 11.9753 20.3532 12.7739 21.2928L15.2071 24.1554C16.0446 25.1406 17.5828 25.0841 18.3458 24.0401L23.8853 16.4597C24.6842 15.3664 26.3159 15.3664 27.1148 16.4597L31.3501 22.2553ZM15.7501 12C15.7501 14.0711 14.0712 15.75 12.0001 15.75C9.92904 15.75 8.25011 14.0711 8.25011 12C8.25011 9.92894 9.92904 8.25 12.0001 8.25C14.0712 8.25 15.7501 9.92894 15.7501 12Z" fill="#B2B7D0"/>
                                </svg>
                                <div class="preview">
                                    <div class="main">
                                        <img src="/storage/avatars/{{\Auth::user()->photo}}" alt="{{\Auth::user()->name}}"/>
                                    </div>
                                    <i>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.75 5.25C14.2415 5.75853 13.9872 6.01279 13.6814 6.0692C13.5615 6.09132 13.4385 6.09132 13.3186 6.0692C13.0128 6.01279 12.7585 5.75853 12.25 5.25L10.75 3.75C10.2415 3.24147 9.98721 2.98721 9.93081 2.68139C9.90869 2.56147 9.90869 2.43853 9.93081 2.31862C9.98721 2.01279 10.2415 1.75853 10.75 1.25V1.25C11.2585 0.741474 11.5128 0.487211 11.8186 0.430803C11.9385 0.408686 12.0615 0.408686 12.1814 0.430803C12.4872 0.487211 12.7415 0.741474 13.25 1.25L14.75 2.75C15.2585 3.25853 15.5128 3.51279 15.5692 3.81862C15.5913 3.93853 15.5913 4.06147 15.5692 4.18139C15.5128 4.48721 15.2585 4.74147 14.75 5.25V5.25ZM2 16C1.05719 16 0.585786 16 0.292893 15.7071C0 15.4142 0 14.9428 0 14V12.8284C0 12.4197 0 12.2153 0.0761205 12.0315C0.152241 11.8478 0.296756 11.7032 0.585787 11.4142L7.08579 4.91421C7.75245 4.24755 8.08579 3.91421 8.5 3.91421C8.91421 3.91421 9.24755 4.24755 9.91421 4.91421L11.0858 6.08579C11.7525 6.75245 12.0858 7.08579 12.0858 7.5C12.0858 7.91421 11.7525 8.24755 11.0858 8.91421L4.58579 15.4142C4.29676 15.7032 4.15224 15.8478 3.96847 15.9239C3.7847 16 3.58032 16 3.17157 16H2Z" fill="white"/>
                                        </svg>
                                    </i>
                                </div>
                            </div>
                            <a href="#" class="trash">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0001 2.10001C9.39847 2.10001 8.1001 3.39838 8.1001 5.00001V5.10001H5.0001H4.0001C3.50304 5.10001 3.1001 5.50295 3.1001 6.00001C3.1001 6.49706 3.50304 6.90001 4.0001 6.90001H5.0001H5.30894L6.13436 19.1715L6.13448 19.1735C6.226 20.6219 7.42747 21.75 8.879 21.75H15.1212C16.5727 21.75 17.7741 20.6219 17.8657 19.1736L17.8658 19.1715L18.6913 6.90001H19.0001H20.0001C20.4972 6.90001 20.9001 6.49706 20.9001 6.00001C20.9001 5.50295 20.4972 5.10001 20.0001 5.10001H19.0001H15.9001V5.00001C15.9001 3.39838 14.6017 2.10001 13.0001 2.10001H11.0001ZM14.1001 5.10001H9.9001V5.00001C9.9001 4.39249 10.3926 3.90001 11.0001 3.90001H13.0001C13.6076 3.90001 14.1001 4.39249 14.1001 5.00001V5.10001ZM10.5993 9.96147C10.578 9.46487 10.1582 9.07955 9.66156 9.10083C9.16496 9.12211 8.77964 9.54194 8.80092 10.0385L9.10092 17.0385C9.12221 17.5351 9.54203 17.9205 10.0386 17.8992C10.5352 17.8779 10.9206 17.4581 10.8993 16.9615L10.5993 9.96147ZM15.1993 10.0385C15.2206 9.54194 14.8352 9.12211 14.3386 9.10083C13.842 9.07955 13.4222 9.46487 13.4009 9.96147L13.1009 16.9615C13.0796 17.4581 13.465 17.8779 13.9616 17.8992C14.4582 17.9205 14.878 17.5351 14.8993 17.0385L15.1993 10.0385Z" fill="#B2B7D0"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="input-thumbs">
                        <label>{{__("box.how_to_contact_you")}}</label>
                        <input type="text" onkeypress="onlyLetters(event)" value="{{\Auth::user()->FIO}}" name="name" placeholder="{{__("box.enter_name")}}"/>
                    </div>
                    <div class="input-thumbs">
                        <label>{{__("box.birth_date")}}</label>
                        <input type="date" value="{{\Auth::user()->birth}}" name="birth" placeholder="{{__("box.enter_birth_date")}}"/>
                    </div>
                    <div class="input-thumbs">
                        <label>{{__("box.gender")}}</label>
                        <div class="gender mb-0">
            <span class="checkbox">
                @if(\Auth::user()->gender == 1)
                <input type="radio" value="male" name="gender" checked>
                @else
                    <input type="radio" value="male" name="gender">
                @endif
              <i>
                <svg width="28" height="30" viewBox="0 0 28 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2 15C2 8.37258 7.37258 3 14 3C20.6274 3 26 8.37258 26 15C26 21.6274 20.6274 27 14 27C7.37258 27 2 21.6274 2 15Z" fill="#0085FF"/>
                  <path d="M12.5535 17.5593L19.0048 10.8045C19.3926 10.3985 20.0213 10.3985 20.4091 10.8045C20.7969 11.2105 20.7969 11.8689 20.4091 12.2749L12.5535 20.5L7.99079 15.7227C7.603 15.3167 7.603 14.6584 7.99079 14.2524C8.37858 13.8464 9.00731 13.8464 9.3951 14.2524L12.5535 17.5593Z" fill="white"/>
                </svg>
              </i>
              <span>
                {{__("box.male")}}
              </span>
            </span>
            <span class="checkbox">
                @if(\Auth::user()->gender == 2)
                    <input type="radio" value="female" name="gender" checked>
                @else
                    <input type="radio" value="female" name="gender">
                @endif
              <i>
                <svg width="28" height="30" viewBox="0 0 28 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2 15C2 8.37258 7.37258 3 14 3C20.6274 3 26 8.37258 26 15C26 21.6274 20.6274 27 14 27C7.37258 27 2 21.6274 2 15Z" fill="#0085FF"/>
                  <path d="M12.5535 17.5593L19.0048 10.8045C19.3926 10.3985 20.0213 10.3985 20.4091 10.8045C20.7969 11.2105 20.7969 11.8689 20.4091 12.2749L12.5535 20.5L7.99079 15.7227C7.603 15.3167 7.603 14.6584 7.99079 14.2524C8.37858 13.8464 9.00731 13.8464 9.3951 14.2524L12.5535 17.5593Z" fill="white"/>
                </svg>
              </i>
              <span>
                {{__("box.female")}}
              </span>
            </span>
                    </div>
                    </div>
                </div>
                <strong class="edit-title">{{__("box.change_password")}}</strong>
                <div class="bordered">
                    <div class="input-thumbs">
                        <label>{{__("box.old_password")}}</label>
                        <input type="password" name="old_password" placeholder="{{__("box.enter_old_password")}}"/>
                        <i class="eye">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 11.75C6.06271 11.75 4.00451 10.5827 2.37694 8C4.00451 5.41731 6.06271 4.25 8 4.25C9.93729 4.25 11.9955 5.41731 13.6231 8C11.9955 10.5827 9.93729 11.75 8 11.75ZM15.1478 7.6221C13.3086 4.46908 10.7206 2.75 8 2.75C5.27937 2.75 2.69142 4.46908 0.852166 7.62209C0.715945 7.85562 0.715945 8.14438 0.852166 8.3779C2.69142 11.5309 5.27937 13.25 8 13.25C10.7206 13.25 13.3086 11.5309 15.1478 8.3779C15.2841 8.14438 15.2841 7.85562 15.1478 7.6221ZM8 11C9.65685 11 11 9.65685 11 8C11 6.34315 9.65685 5 8 5C6.34315 5 5 6.34315 5 8C5 9.65685 6.34315 11 8 11Z" fill="#B2B7D0"/>
                            </svg>
                        </i>
                    </div>
                    <div class="input-thumbs">
                        <label>{{__("box.new_password")}}</label>
                        <input type="password" value="" name="password" placeholder="{{__("box.create_password")}}"/>
                        <i class="eye">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 11.75C6.06271 11.75 4.00451 10.5827 2.37694 8C4.00451 5.41731 6.06271 4.25 8 4.25C9.93729 4.25 11.9955 5.41731 13.6231 8C11.9955 10.5827 9.93729 11.75 8 11.75ZM15.1478 7.6221C13.3086 4.46908 10.7206 2.75 8 2.75C5.27937 2.75 2.69142 4.46908 0.852166 7.62209C0.715945 7.85562 0.715945 8.14438 0.852166 8.3779C2.69142 11.5309 5.27937 13.25 8 13.25C10.7206 13.25 13.3086 11.5309 15.1478 8.3779C15.2841 8.14438 15.2841 7.85562 15.1478 7.6221ZM8 11C9.65685 11 11 9.65685 11 8C11 6.34315 9.65685 5 8 5C6.34315 5 5 6.34315 5 8C5 9.65685 6.34315 11 8 11Z" fill="#B2B7D0"/>
                            </svg>
                        </i>
                    </div>
                    <div class="input-thumbs">
                        <label>{{__("box.confirm_password")}}</label>
                        <input type="password" value="" name="password_confirmation" placeholder="{{__("box.confirm_password")}}"/>
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
                        {{__("box.password_rule")}}
                    </div>
                </div>
                <strong class="edit-title">{{__("box.change_tel_num")}}</strong>
                <div class="input-thumbs">
                    <label>{{__("box.mobile_tel_num")}}</label>
                    <div class="input">
                        <div class="helper">+998</div>
                        <input type="text" onkeypress="onlyNumber(event)" maxlength="9" value="" id="phone" placeholder="{{__("box.mobile_num")}}"/>
                        <input type="text" value="" name="phone" hidden/>
                    </div>
                    <br><br><br>
                    <button type="button" id="sendSMS">{{ __('box.get_sms') }}</button>
                </div>
                <div class="input-thumbs">
                    <label for="verifyCode" id="verifyCodeLabel">{{__("box.confirm_code")}}</label>
                    <input type="text" onkeypress="onlyNumber(event)" id="verifyCode" value="" name="verifyCode" placeholder="{{__("box.enter_code")}}"/>
                    <span class="timer">03:00</span>
                </div>
            </div>
            <div class="bottom">
                <button type="submit">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
@section("js")
    <script>
        $("#sendSMS").click(function () {
            let thisBtn = $(this);
            let data = {
                "_token": "{{csrf_token()}}",
                "phone": $("#phone").val(),
            };
            console.log(data);
            if ($("#phone").val())
                $.ajax({
                    url: "/user/sendMessage",
                    type: "POST",
                    data: data,
                    success: function (data) {
                        if (data.url) {
                            window.location.replace(data.url);
                        }
                        else if(data.status == "success") {
                            let id  = $("#verifyCodeLabel").attr('id'),
                                top = $("#"+id).offset().top;
                            $('body,html').animate({scrollTop: top}, 500);
                            userID = data.message;
                            setIntervalTime();
                            thisBtn.attr("disabled", "disabled");
                            $("input[name=phone]").val($("#phone").val());
                            $("#phone").attr("disabled", "disabled");
                            $("#verifyCode").removeAttr("disabled");
                            setTimeout(function () {
                                thisBtn.removeAttr("disabled");
                                $("#phone").removeAttr("disabled");
                                $("#verifyCode").attr("disabled", "disabled");
                                $("#verifyCode").val("");
                                $("#verifyCode").text("");
                                $(".timer").text("03:00");
                                id  = $("#phoneLabel").attr('id');
                                top = $("#"+id).offset().top;
                                $('body,html').animate({scrollTop: top}, 500);
                            },180000);
                        }
                    }

                });
        });

        $("input[name=password]").on("keyup", function () {
            if($(this).val().length != 0 && $(this).val().length < 8) {
                $("button[type=submit]").attr("disabled", "disabled");
                $(this).css("border-color", "red");
            }
            else if($(this).val().length == 0 || $(this).val().length >= 8) {
                $("button[type=submit]").removeAttr("disabled");
            }

            if($(this).val().length >=8) {
                $(this).css("border-color", "green");
            }
        });
        $("input[name=password_confirmation]").on("keyup", function () {
            if($(this).val() != $("input[name=password]").val()) {
                $(this).css("border-color", "red");
            }
            else {
                $(this).css("border-color", "green");
            }
        });

    </script>
@endsection