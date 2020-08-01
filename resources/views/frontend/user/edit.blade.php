@extends("frontend.layout")
@section("content")
    <div class="center-content">
        <div class="auth-page profile-edit">
            @include("errors")
            @include("message")
            <form action="{{route("user.update")}}" method="post" id="editForm" enctype="multipart/form-data">
                @csrf
                <div class="top">
                    <div class="bordered">
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
                    </div>
                    <div class="bordered ma-25">
                        <div class="profile-content">
                            <div class="profile-photo">
                                <div class="img">
                                    <input type="file" onchange="fileCHeck(this)" data-target=".img" value="" name="photo"/>
                                    <div class="preview">
                                        <img src="{{ asset((\Auth::user()->photo == "" || \Auth::user()->photo == null) ? "assets/img/user-empty.png" : "storage/avatars/".\Auth::user()->photo)}}" alt=""/>
                                    </div>
                                    <span class="trash">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69999 1.20001C6.49712 1.20001 5.50992 2.12341 5.40857 3.30001H3.49999H2.79999C2.30294 3.30001 1.89999 3.70296 1.89999 4.20001C1.89999 4.69707 2.30294 5.10001 2.79999 5.10001H3.49999H3.50884L4.06941 13.4341L4.06954 13.4361C4.14132 14.5683 5.08055 15.45 6.21523 15.45H10.5848C11.7195 15.45 12.6587 14.5682 12.7305 13.436L12.7306 13.4341L13.2912 5.10001H13.3H14C14.497 5.10001 14.9 4.69707 14.9 4.20001C14.9 3.70296 14.497 3.30001 14 3.30001H13.3H11.3914C11.2901 2.12341 10.3029 1.20001 9.09999 1.20001H7.69999ZM9.55839 3.30001H7.2416C7.31875 3.12342 7.49496 3.00001 7.69999 3.00001H9.09999C9.30503 3.00001 9.48123 3.12342 9.55839 3.30001ZM7.68917 6.96147C7.66789 6.46487 7.24806 6.07955 6.75146 6.10084C6.25486 6.12212 5.86954 6.54195 5.89082 7.03855L6.10082 11.9385C6.1221 12.4351 6.54193 12.8205 7.03853 12.7992C7.53513 12.7779 7.92045 12.3581 7.89917 11.8615L7.68917 6.96147ZM10.9092 7.03855C10.9305 6.54195 10.5451 6.12212 10.0485 6.10084C9.55193 6.07955 9.1321 6.46487 9.11082 6.96147L8.90082 11.8615C8.87954 12.3581 9.26486 12.7779 9.76146 12.7992C10.2581 12.8205 10.6779 12.4351 10.6992 11.9385L10.9092 7.03855Z" fill="black"/>
                                        </svg>
                                    </span>
                                </div>
                                <div class="info-profile">
                                    <a href="javascript:;">{{\Auth::user()->FIO}}</a>
                                    <a href="{{ route("logout") }}" class="tags">{{ __("box.logout") }}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <strong class="edit-title">{{ __("box.change_personal_data")}}</strong>
                    <div class="bordered d-flex">
                        <div class="input-thumbs">
                            <label>{{__("box.how_to_contact_you")}}</label>
                            <input type="text" onkeypress="onlyLetters(event)" value="{{\Auth::user()->FIO}}" name="name" placeholder="{{__("box.enter_name")}}"/>
                        </div>
                        <div class="selectbox input-thumbs">
                            <label>{{__("box.birth_date")}}</label>
                            <select class="select-box" name="birth" id="birth">
                                @for($i = 0; $i <= 70; $i++)

                                    <option value="{{ 2015-$i }}" {{ (2015-$i == date("Y",strtotime(\Auth::user()->birth))) ? "selected" : "" }}>{{ 2015-$i }}</option>
                                @endfor
                            </select>
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
                    <div class="bordered d-flex">
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
                            <span class="error-detail">
                                <i>
                                  <svg width="18" height="18" viewBox="0 0 18 18" fill="#FFA514" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 0C4.02528 0 0 4.02564 0 9C0 13.9747 4.02564 18 9 18C13.9747 18 18 13.9744 18 9C18 4.02528 13.9744 0 9 0ZM9 16.5938C4.80259 16.5938 1.40625 13.1971 1.40625 9C1.40625 4.80259 4.80287 1.40625 9 1.40625C13.1974 1.40625 16.5938 4.80287 16.5938 9C16.5938 13.1974 13.1971 16.5938 9 16.5938Z" />
                                    <path d="M9 4.53085C8.61166 4.53085 8.29688 4.84564 8.29688 5.23398V9.76186C8.29688 10.1502 8.61166 10.465 9 10.465C9.38834 10.465 9.70312 10.1502 9.70312 9.76186V5.23398C9.70312 4.84564 9.38834 4.53085 9 4.53085Z"/>
                                    <path d="M9 13.2244C9.52424 13.2244 9.94922 12.7994 9.94922 12.2751C9.94922 11.7509 9.52424 11.3259 9 11.3259C8.47576 11.3259 8.05078 11.7509 8.05078 12.2751C8.05078 12.7994 8.47576 13.2244 9 13.2244Z"/>
                                  </svg>
                                </i>
                                {{__("box.password_rule")}}
                              </span>
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
                        <div class="alert warning mobile">
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
                    <div class="d-flex">
                        <div class="input-thumbs">
                            <label>{{__("box.mobile_tel_num")}}</label>
                            <div class="input">
                                <div class="helper">+998</div>
                                <input type="text" inputmode="numeric" onkeypress="onlyNumber(event),handleMask(event, '(99)999-9999')" maxlength="9" value="" id="phone" placeholder="{{__("box.mobile_num")}}"/>
                                <input type="text" value="" name="phone" hidden/>
                            </div>
                        </div>
                        <div class="input-thumbs">
                            <label for="verifyCode" id="verifyCodeLabel">{{__("box.confirm_code")}}</label>
                            <input type="text" onkeypress="onlyNumber(event)" id="verifyCode" value="" name="verifyCode" placeholder="{{__("box.enter_code")}}"/>
                            <span class="timer">03:00</span>
                        </div>
                        <div class="input-thumbs" style="margin-left: 3.64583333vw">
                            <label style="margin-bottom: 0.54166667vw">&nbsp;</label>
                            <button type="button" id="sendSMS">{{ __('box.get_sms') }}</button>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <button type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("js")

    <script>
        $(function () {
            $('#phone').mask('(99)999-9999',{
                placeholder:'_'
            });
        });
        $("#editForm").submit(function (e) {
            var phone = $("#phone").val();
            phone = phone.replace(")","");
            phone = phone.replace("(","");
            phone = phone.replace("-","");
            $("input[name=phone]").val(phone);
        });

        $(".trash").click(function () {
            $.post("{{ route("api.user.removeImg",\Auth::user()->id) }}", function () {
                $(".preview img").attr("src","/assets/img/user-empty.png");
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
            if($(this).val().length != 0 && $(this).val().length < 4) {
                $("button[type=submit]").attr("disabled", "disabled");
                $(this).removeClass("right");
                $(this).addClass("wrong");
            }
            else if($(this).val().length == 0 || $(this).val().length >= 4) {
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
