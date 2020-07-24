@extends("frontend.layout")
@section("content")
    <div class="auth-page">
        @include("errors")
        @include("message")
        <form action="{{route("user.update")}}" method="post" id="editForm" enctype="multipart/form-data">
            @csrf
            <div class="top">
            <a href="{{ route("survey.list") }}" class="back">
                <i>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM16 7L0.999999 7V9L16 9V7Z" fill="black"/>
                    </svg>
                </i>
                <div class="info">
                    <h1>{{__("box.personal_data")}}</h1>
                </div>
            </a>
            <div class="profile-content content">
                <div class="profile-photo">
                    <div class="img">
                        <div class="preview">
                            <img src="{{ asset((\Auth::user()->photo == "" || \Auth::user()->photo == null) ? "assets/img/user-empty.png" : "storage/avatars/".\Auth::user()->photo)}}" alt="{{\Auth::user()->name}}"/>
                        </div>
                        <span>
                <input type="file" onchange="fileCHeck(this)" data-target=".img" value="" name="photo"/>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M14.75 5.25C14.2415 5.75853 13.9872 6.01279 13.6814 6.0692C13.5615 6.09132 13.4385 6.09132 13.3186 6.0692C13.0128 6.01279 12.7585 5.75853 12.25 5.25L10.75 3.75C10.2415 3.24147 9.98721 2.98721 9.93081 2.68139C9.90869 2.56147 9.90869 2.43853 9.93081 2.31862C9.98721 2.01279 10.2415 1.75853 10.75 1.25V1.25C11.2585 0.741474 11.5128 0.487211 11.8186 0.430803C11.9385 0.408686 12.0615 0.408686 12.1814 0.430803C12.4872 0.487211 12.7415 0.741474 13.25 1.25L14.75 2.75C15.2585 3.25853 15.5128 3.51279 15.5692 3.81862C15.5913 3.93853 15.5913 4.06147 15.5692 4.18139C15.5128 4.48721 15.2585 4.74147 14.75 5.25V5.25ZM2 16C1.05719 16 0.585786 16 0.292893 15.7071C0 15.4142 0 14.9428 0 14V12.8284C0 12.4197 0 12.2153 0.0761205 12.0315C0.152241 11.8478 0.296756 11.7032 0.585787 11.4142L7.08579 4.91421C7.75245 4.24755 8.08579 3.91421 8.5 3.91421C8.91421 3.91421 9.24755 4.24755 9.91421 4.91421L11.0858 6.08579C11.7525 6.75245 12.0858 7.08579 12.0858 7.5C12.0858 7.91421 11.7525 8.24755 11.0858 8.91421L4.58579 15.4142C4.29676 15.7032 4.15224 15.8478 3.96847 15.9239C3.7847 16 3.58032 16 3.17157 16H2Z" fill="#000"/>
                </svg>
              </span>
                    </div>
                    <div class="info-profile">
                        <a href="javascript:;">{{\Auth::user()->FIO}}</a>

                        <a href="{{ route("logout") }}" class="tags">Выйти из аккаунта</a>
                    </div>

                </div>
            </div>
                <div class="bordered">
                    <div class="input-thumbs">
                        <label>{{__("box.how_to_contact_you")}}</label>
                        <input type="text" onkeypress="onlyLetters(event)" value="{{\Auth::user()->FIO}}" name="name" placeholder="{{__("box.enter_name")}}"/>
                    </div>
                    <div class="input-thumbs">
                        <label>{{__("box.birth_date")}}</label>
                        <input type="date" id="birth" value="{{date("d.m.Y",strtotime(\Auth::user()->birth))}}" name="birth" placeholder="{{__("box.enter_birth_date")}}"/>
                    </div>
                    <div class="input-thumbs">
                        <label>{{__("box.gender")}}</label>
                        <div class="gender mb-0">
            <span class="checkbox">
                @if(\Auth::user()->gender == 1)
                <input type="radio" value="1" name="gender" checked>
                @else
                    <input type="radio" value="1" name="gender">
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
                    <input type="radio" value="2" name="gender" checked>
                @else
                    <input type="radio" value="2" name="gender">
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
                        <input type="tel" onkeypress="onlyNumber(event)" maxlength="9" value="" id="phone" placeholder="{{__("box.mobile_num")}}"/>
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
    <script src="{{ asset("js/jquery.maskedinput.min.js") }}"></script>
    <script>
        $(function(){
            //2. Получить элемент, к которому необходимо добавить маску
            $("#phone").mask("(99)999-9999");
            // $("#birth").mask("99.99.9999");
        });
        $("#editForm").submit(function (e) {
            var phone = $("#phone").val();
            phone = phone.replace(")","");
            phone = phone.replace("(","");
            phone = phone.replace("-","");
            $("input[name=phone]").val(phone);
        });

        $(".trash").click(function () {
            $(".preview").html("");
            $.post("{{ route("api.user.removeImg",\Auth::user()->id) }}", function () {
                $(".preview").html("");
            });
        });

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
                $(this).removeClass("right");
                $(this).addClass("wrong");
            }
            else if($(this).val().length == 0 || $(this).val().length >= 8) {
                $("button[type=submit]").removeAttr("disabled");
                $(this).removeClass("wrong");
                $(this).addClass("right");
            }

            if($(this).val().length >=8) {
                $(this).addClass("right");
                $(this).removeClass("wrong");
            }
            if($(this).val().length == 0) {
                $(this).removeClass("wrong");
                $(this).removeClass("right");
            }
        });
        $("input[name=password_confirmation]").on("keyup", function () {
            if($(this).val() != $("input[name=password]").val()) {
                $(this).removeClass("right");
                $(this).addClass("wrong");
            }
            else {
                $(this).removeClass("wrong");
                $(this).addClass("right");
            }
            if($(this).val().length == 0) {
                $(this).removeClass("wrong");
                $(this).removeClass("right");
            }
        });

    </script>
@endsection

@section("css")
    <style>
        .right {
            border: 2px solid green!important;
        }
        .wrong {
            border: 2px solid red!important;
        }
    </style>
@endsection
