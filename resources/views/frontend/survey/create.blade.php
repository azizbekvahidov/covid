@extends("frontend.layout")
@section("title", " —")
@section("content")
    @include("errors")
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey={{config("map")["map_apikey"]}}" type="text/javascript"></script>

    <div class="center-content">
        <div class="pa-15">
            <a href="{{ route("survey.category") }}" class="back">
                <i>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM16 7L0.999999 7V9L16 9V7Z" fill="black"/>
                    </svg>
                </i>
                <strong>
                    @if(app()->getLocale() == "uz")
                        {{$category->uz_name}}
                    @elseif(app()->getLocale() == "ru")
                        {{$category->ru_name}}
                    @elseif(app()->getLocale() == "cyrillic_uz")
                        {{$category->cyrillic_uz_name}}
                    @endif
                </strong>
            </a>
        </div>
        <form id="surveyForm"  method="post" enctype="multipart/form-data" class="categoryForm">
            @csrf
            <input type="text" name="category" value="{{$category->id}}" hidden>
            @if($category->id === 5 || $category->id === 7)
                <input id="rating5" type="radio" class="rate validate" name="rank" value="0" checked hidden>
            @else
                <div class="blue-bg" id="rating">
                    <div class="rating-panel">
                        <strong>{{ __("box.rate") }}
                            @if(app()->getLocale() == "uz")
                                <span style="text-transform: lowercase" >{{$category->uz_name}}</span>{{__("box.rate_continue")}}
                            @elseif(app()->getLocale() == "ru")
                                <span style="text-transform: lowercase" >{{$category->ru_name}}</span>{{__("box.rate_continue")}}
                            @elseif(app()->getLocale() == "cyrillic_uz")
                                <span style="text-transform: lowercase" >{{$category->cyrillic_uz_name}}</span>{{__("box.rate_continue")}}
                            @endif</strong>
                        <span class="starRating">
                      <input id="rating5" type="radio" class="rate validate" name="rank" value="5">
                      <label for="rating5">5</label>
                      <input id="rating4" type="radio" class="rate validate" name="rank" value="4">
                      <label for="rating4">4</label>
                      <input id="rating3" type="radio" class="rate validate" name="rank" value="3" >
                      <label for="rating3">3</label>
                      <input id="rating2" type="radio" class="rate validate" name="rank" value="2">
                      <label for="rating2">2</label>
                      <input id="rating1" type="radio" class="rate validate" name="rank" value="1">
                      <label for="rating1">1</label>
                    </span>
                    </div>
                </div>
            @endif
            <div class="pa-15">
                <div class="text-area" id="opinion">
                    <label >{{__("box.describe_problem")}}</label>
                    <textarea name="opinion" class="check-length validate"  maxlength="1200"></textarea>
                    <div class="length-counter">1200</div>
                </div>
                <div class="fileUpload">
                    <label>{{__("box.put_photo")}} <a href="javascript:;" class="clearFiles">{{ __("box.clear") }}</a></label>
                    @for($i = 0; $i < 5; $i++)
                    <div class="thumbs">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.863 0.175073C13.2583 0.175073 12.768 0.665347 12.768 1.27013V12.7679H1.26982C0.665038 12.7679 0.174765 13.2582 0.174765 13.863C0.174765 14.4678 0.665039 14.958 1.26982 14.958H12.768V26.4564C12.768 27.0612 13.2583 27.5515 13.863 27.5515C14.4678 27.5515 14.9581 27.0612 14.9581 26.4564V14.958H26.4561C27.0609 14.958 27.5512 14.4678 27.5512 13.863C27.5512 13.2582 27.0609 12.7679 26.4561 12.7679H14.9581V1.27013C14.9581 0.665346 14.4678 0.175073 13.863 0.175073Z" fill="#B2B7D0"/>
                        </svg>
                        <input type="file" onchange="fileCHeck(this,true)" data-target=".thumbs" value="" name="">
                        <div class="preview"></div>
                    </div>
                    @endfor

                </div>
                <div class="alert error size" style="background: rgba(250, 74, 74, 0.15); margin-bottom: 10px; display: none">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="9" r="9" fill="#f32525"/>
                        <path d="M9 14C11.7614 14 14 11.7614 14 9C14 6.23858 11.7614 4 9 4C6.23858 4 4 6.23858 4 9C4 11.7614 6.23858 14 9 14Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 7V9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 11H9.005" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {{__("box.photo_rule")}}
{{--                    Размер файла не должно превышать 5Mb--}}
                </div>
                <div class="alert error type" style="background: rgba(250, 74, 74, 0.15); margin-bottom: 10px; display: none">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="9" r="9" fill="#f32525"/>
                        <path d="M9 14C11.7614 14 14 11.7614 14 9C14 6.23858 11.7614 4 9 4C6.23858 4 4 6.23858 4 9C4 11.7614 6.23858 14 9 14Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 7V9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 11H9.005" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {{__("box.photo_rule_type")}}
                    {{--                    Размер файла не должно превышать 5Mb--}}
                </div>
                <div class="player mobile">
                    <div class="thumbs unactive">
                        <a href="javascript:;" class="playingbutton"  id="btnStart">
                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 5.66667V8.33333C0 11.3105 0 12.799 0.971008 13.3817C1.94202 13.9643 3.25546 13.2638 5.88235 11.8627L8.38235 10.5294C11.2941 8.97647 12.75 8.2 12.75 7C12.75 5.8 11.2941 5.02353 8.38235 3.47059L5.88235 2.13725C3.25546 0.736246 1.94202 0.0357424 0.971008 0.618348C0 1.20095 0 2.68952 0 5.66667Z" fill="#007BEC"/>
                            </svg>
                        </a>
                        <div id="waveform" class="line" style="background: none;"></div>
                        <span class="delay" style="display: none;"><span id="minutes">00</span>:<span id="seconds">00</span></span>
                        <div class="record recorder" ></div>
                        <div class="record record-delete" style="display: none;" onclick="refreshRecord(this)"></div>
                    </div>
                </div>

            </div>

            <div class="blue-bg mood">
                <strong>{{__("box.your_mood")}}</strong>
                <div class="smile-panel">
                    <div class="thumbs {{(time() - $old_mark_time < 43200) ? "opacity" : ""}}">
                        <input type="radio" value="5" name="mood" {{(time() - $old_mark_time < 43200) ? "disabled" : ""}} >
                        <i>
                            <svg width="36" height="39" viewBox="0 0 36 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M36 19.3681C36 29.6942 27.941 38.0654 18 38.0654C8.059 38.0654 0 29.6942 0 19.3681C0 9.04202 8.059 0.670837 18 0.670837C27.941 0.670837 36 9.04202 36 19.3681Z" fill="url(#paint0_linear)"/>
                                <path d="M7 24.5618C9.76142 24.5618 12 22.2365 12 19.3681C12 16.4997 9.76142 14.1744 7 14.1744C4.23858 14.1744 2 16.4997 2 19.3681C2 22.2365 4.23858 24.5618 7 24.5618Z" fill="#EF006D" fill-opacity="0.5"/>
                                <path d="M29 24.5618C31.7614 24.5618 34 22.2365 34 19.3681C34 16.4997 31.7614 14.1744 29 14.1744C26.2386 14.1744 24 16.4997 24 19.3681C24 22.2365 26.2386 24.5618 29 24.5618Z" fill="#EF006D" fill-opacity="0.5"/>
                                <path d="M27.3351 23.1377C27.1571 22.9704 26.8911 22.96 26.7001 23.1075C26.6611 23.1377 22.7781 26.1199 18.0001 26.1199C13.2341 26.1199 9.33809 23.1377 9.30009 23.1075C9.10909 22.96 8.84309 22.9725 8.66509 23.1377C8.48809 23.3039 8.44809 23.5781 8.57109 23.79C8.70009 24.0133 11.7881 29.2361 18.0001 29.2361C24.2121 29.2361 27.3011 24.0133 27.4291 23.79C27.5521 23.577 27.5131 23.3039 27.3351 23.1377ZM7.99909 16.2519C7.84909 16.2519 7.69609 16.2166 7.55309 16.1418C7.05909 15.8852 6.85909 15.2609 7.10609 14.7478C7.15809 14.6398 8.42409 12.0969 12.0001 12.0969C15.5771 12.0969 16.8421 14.6408 16.8941 14.7488C17.1411 15.262 16.9411 15.8862 16.4471 16.1428C15.9551 16.3973 15.3621 16.1937 15.1111 15.6899C15.0681 15.6068 14.2811 14.1744 12.0001 14.1744C9.68309 14.1744 8.90109 15.6629 8.89409 15.6774C8.71909 16.042 8.36609 16.2519 7.99909 16.2519ZM28.0011 16.2519C27.6341 16.2519 27.2811 16.042 27.1051 15.6774C27.0801 15.6297 26.2991 14.1744 24.0001 14.1744C21.7011 14.1744 20.9201 15.6297 20.8881 15.691C20.6281 16.1906 20.0291 16.3869 19.5431 16.1272C19.0581 15.8655 18.8611 15.2557 19.1051 14.7478C19.1571 14.6408 20.4231 12.0969 24.0001 12.0969C27.5771 12.0969 28.8431 14.6408 28.8951 14.7488C29.1421 15.262 28.9421 15.8862 28.4481 16.1428C28.3041 16.2166 28.1511 16.2519 28.0011 16.2519Z" fill="#664500"/>
                                <defs>
                                    <linearGradient id="paint0_linear" x1="3.5" y1="0.670837" x2="34.3819" y2="37.9596" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD365"/>
                                        <stop offset="1" stop-color="#EDA900"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </i>
                    </div>
                    <div class="thumbs {{(time() - $old_mark_time < 43200) ? "opacity" : ""}}">
                        <input type="radio" value="4" name="mood" {{(time() - $old_mark_time < 43200) ? "disabled" : ""}} >
                        <i>
                            <svg width="36" height="39" viewBox="0 0 36 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 38.0654C27.9411 38.0654 36 29.6943 36 19.3681C36 9.04189 27.9411 0.670837 18 0.670837C8.05887 0.670837 0 9.04189 0 19.3681C0 29.6943 8.05887 38.0654 18 38.0654Z" fill="url(#paint0_linear)"/>
                                <path d="M10.5149 25.2068C10.5599 25.3928 11.6829 29.7555 17.9999 29.7555C24.3179 29.7555 25.4399 25.3928 25.4849 25.2068C25.5399 24.9814 25.4419 24.7477 25.2479 24.6314C25.0529 24.5161 24.8089 24.5503 24.6479 24.7113C24.6289 24.7311 22.6939 26.6393 17.9999 26.6393C13.3059 26.6393 11.3699 24.7311 11.3519 24.7124C11.2559 24.6137 11.1279 24.5618 10.9999 24.5618C10.9159 24.5618 10.8309 24.5836 10.7539 24.6282C10.5579 24.7446 10.4599 24.9804 10.5149 25.2068Z" fill="#664500"/>
                                <path d="M12 18.3293C13.3807 18.3293 14.5 16.7016 14.5 14.6938C14.5 12.6859 13.3807 11.0582 12 11.0582C10.6193 11.0582 9.5 12.6859 9.5 14.6938C9.5 16.7016 10.6193 18.3293 12 18.3293Z" fill="#664500"/>
                                <path d="M24 18.3293C25.3807 18.3293 26.5 16.7016 26.5 14.6938C26.5 12.6859 25.3807 11.0582 24 11.0582C22.6193 11.0582 21.5 12.6859 21.5 14.6938C21.5 16.7016 22.6193 18.3293 24 18.3293Z" fill="#664500"/>
                                <defs>
                                    <linearGradient id="paint0_linear" x1="3.5" y1="0.670837" x2="34.3819" y2="37.9596" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD365"/>
                                        <stop offset="1" stop-color="#EDA900"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </i>
                    </div>
                    <div class="thumbs {{(time() - $old_mark_time < 43200) ? "opacity" : ""}}">
                        <input type="radio" value="3" name="mood" {{(time() - $old_mark_time < 43200) ? "disabled" : ""}} >
                        <i>
                            <svg width="36" height="39" viewBox="0 0 36 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M36 19.3681C36 29.6942 27.941 38.0654 18 38.0654C8.059 38.0654 0 29.6942 0 19.3681C0 9.04202 8.059 0.670837 18 0.670837C27.941 0.670837 36 9.04202 36 19.3681Z" fill="url(#paint0_linear)"/>
                                <path d="M24.327 25.2079C24.174 25.0707 23.959 25.0427 23.776 25.1362L19.776 27.2137C17.905 28.1849 13.049 28.1973 13 28.1973C12.724 28.1973 12.5 28.43 12.5 28.7167C12.5 28.9089 12.601 29.0772 12.75 29.1665V29.1675H12.751V29.1686C12.822 29.2101 12.904 29.234 12.991 29.2361H19.999C22.657 29.2361 24.088 26.9664 24.474 25.7646C24.538 25.5652 24.48 25.346 24.327 25.2079ZM31.001 17.2906C30.696 17.2906 30.397 17.1472 30.2 16.8751C27.559 13.2177 24.139 13.1367 23.994 13.1356C23.444 13.1294 23 12.662 23.003 12.0917C23.006 11.5194 23.45 11.0582 24 11.0582C24.184 11.0582 28.537 11.1101 31.8 15.6286C32.132 16.0877 32.042 16.739 31.6 17.0828C31.42 17.2231 31.21 17.2906 31.001 17.2906ZM4.99895 17.2906C4.79095 17.2906 4.57995 17.2231 4.39995 17.0828C3.95795 16.739 3.86895 16.0877 4.19995 15.6286C7.46195 11.1101 11.816 11.0582 12 11.0582C12.552 11.0582 13 11.5235 13 12.0969C13 12.6692 12.555 13.1336 12.004 13.1356C11.848 13.1377 8.43495 13.225 5.79895 16.8751C5.60395 17.1472 5.30295 17.2906 4.99895 17.2906ZM15.897 18.7407C15.92 18.6867 15.956 18.641 15.97 18.5807C16.104 18.0239 15.778 17.4599 15.243 17.3207C15.063 17.274 10.776 16.1989 7.44595 18.5028C6.98695 18.8207 6.86295 19.4657 7.16895 19.9435C7.36095 20.2448 7.67795 20.4068 8.00095 20.4068C8.19095 20.4068 8.38395 20.3497 8.55495 20.2323C9.64695 19.4751 10.917 19.1988 12.023 19.1302C12.014 19.2091 12 19.2871 12 19.3681C12 20.5148 12.896 21.4455 14 21.4455C15.104 21.4455 16 20.5148 16 19.3681C16 19.1479 15.958 18.9401 15.897 18.7407ZM27.896 18.7396C27.919 18.6856 27.955 18.641 27.969 18.5817C28.104 18.025 27.778 17.4609 27.242 17.3218C27.062 17.275 22.776 16.1999 19.445 18.5038C18.985 18.8217 18.861 19.4668 19.168 19.9446C19.36 20.2448 19.678 20.4068 20.001 20.4068C20.191 20.4068 20.384 20.3497 20.555 20.2323C21.647 19.4751 22.916 19.1998 24.024 19.1312C24.015 19.2102 24 19.2871 24 19.3681C24 20.5148 24.896 21.4455 26 21.4455C27.104 21.4455 28 20.5148 28 19.3681C28 19.1479 27.958 18.9391 27.896 18.7396Z" fill="#664500"/>
                                <defs>
                                    <linearGradient id="paint0_linear" x1="3.5" y1="0.670837" x2="34.3819" y2="37.9596" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD365"/>
                                        <stop offset="1" stop-color="#EDA900"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </i>
                    </div>
                    <div class="thumbs {{(time() - $old_mark_time < 43200) ? "opacity" : ""}}">
                        <input type="radio" value="2" name="mood" {{(time() - $old_mark_time < 43200) ? "disabled" : ""}} >
                        <i>
                            <svg width="36" height="39" viewBox="0 0 36 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M36 19.3681C36 29.6942 27.941 38.0654 18 38.0654C8.059 38.0654 0 29.6942 0 19.3681C0 9.04202 8.059 0.670837 18 0.670837C27.941 0.670837 36 9.04202 36 19.3681Z" fill="url(#paint0_linear)"/>
                                <path d="M22 28.7167C22 31.5868 20.209 31.8329 18 31.8329C15.79 31.8329 14 31.5868 14 28.7167C14 25.8488 15.79 22.4843 18 22.4843C20.209 22.4843 22 25.8488 22 28.7167ZM30 16.2519C29.876 16.2519 29.75 16.228 29.629 16.1771C24.4 14.0051 22.257 10.733 22.168 10.5949C21.861 10.1171 21.985 9.472 22.445 9.15414C22.904 8.83629 23.522 8.96301 23.83 9.43876C23.849 9.4668 25.76 12.3316 30.371 14.2471C30.884 14.4611 31.134 15.0646 30.929 15.5974C30.772 16.0046 30.396 16.2519 30 16.2519ZM6.00005 16.2519C5.60305 16.2519 5.22805 16.0046 5.07105 15.5985C4.86605 15.0656 5.11505 14.4611 5.62805 14.2481C10.24 12.3327 12.151 9.46784 12.17 9.4398C12.478 8.96613 13.099 8.84044 13.557 9.15934C14.014 9.47927 14.138 10.1202 13.832 10.5959C13.743 10.7341 11.6 14.0061 6.37205 16.1781C6.25005 16.228 6.12405 16.2519 6.00005 16.2519Z" fill="#664500"/>
                                <path d="M24 17.2906H28V37.0267L24 36.9789V17.2906ZM8 37.0267L12 36.9789V17.2906H8V37.0267Z" fill="#5DADEC"/>
                                <path d="M14.9991 19.3681C14.8491 19.3681 14.6961 19.3328 14.5531 19.259C11.0411 17.435 7.48309 19.2403 7.44809 19.259C6.95309 19.5177 6.35309 19.3068 6.10609 18.7947C5.85909 18.2816 6.05909 17.6573 6.55309 17.4007C6.73509 17.3072 11.0511 15.1186 15.4481 17.4007C15.9421 17.6573 16.1421 18.2816 15.8951 18.7947C15.7191 19.1583 15.3661 19.3681 14.9991 19.3681ZM28.9991 19.3681C28.8491 19.3681 28.6961 19.3328 28.5531 19.259C25.0401 17.435 21.4831 19.2403 21.4481 19.259C20.9541 19.5166 20.3541 19.3078 20.1061 18.7947C19.8591 18.2816 20.0591 17.6573 20.5531 17.4007C20.7351 17.3072 25.0541 15.1197 29.4481 17.4007C29.9421 17.6573 30.1421 18.2816 29.8951 18.7947C29.7191 19.1583 29.3661 19.3681 28.9991 19.3681Z" fill="#664500"/>
                                <path d="M18 38.0654C27.9411 38.0654 36 37.1353 36 35.9879C36 34.8406 27.9411 33.9105 18 33.9105C8.05887 33.9105 0 34.8406 0 35.9879C0 37.1353 8.05887 38.0654 18 38.0654Z" fill="#5DADEC"/>
                                <path d="M18 30.7943C19.6569 30.7943 21 29.8641 21 28.7167C21 27.5694 19.6569 26.6392 18 26.6392C16.3431 26.6392 15 27.5694 15 28.7167C15 29.8641 16.3431 30.7943 18 30.7943Z" fill="#DA2F47"/>
                                <defs>
                                    <linearGradient id="paint0_linear" x1="3.5" y1="0.670837" x2="34.3819" y2="37.9596" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD365"/>
                                        <stop offset="1" stop-color="#EDA900"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </i>
                    </div>
                    <div class="thumbs {{(time() - $old_mark_time < 43200) ? "opacity" : ""}}">
                        <input type="radio" value="1" name="mood" {{(time() - $old_mark_time < 43200) ? "disabled" : ""}} >
                        <i>
                            <svg width="36" height="39" viewBox="0 0 36 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M36 19.3681C36 29.6942 27.941 38.0654 18 38.0654C8.06 38.0654 0 29.6942 0 19.3681C0 9.04306 8.06 0.670837 18 0.670837C27.941 0.670837 36 9.04306 36 19.3681Z" fill="#DA2F47"/>
                                <path d="M25.485 31.7072C25.44 31.5213 24.317 27.1586 18 27.1586C11.682 27.1586 10.56 31.5213 10.515 31.7072C10.46 31.9326 10.558 32.1664 10.752 32.2827C10.947 32.3959 11.191 32.3648 11.352 32.2027C11.371 32.183 13.306 30.2748 18 30.2748C22.694 30.2748 24.63 32.183 24.648 32.2017C24.744 32.3004 24.872 32.3523 25 32.3523C25.084 32.3523 25.169 32.3305 25.246 32.2858C25.442 32.1695 25.54 31.9337 25.485 31.7072ZM15.707 18.6337C12.452 15.2526 7.22098 15.2131 6.99998 15.2131C6.44798 15.2131 6.00098 15.6775 6.00098 16.2498C5.99998 16.8232 6.44698 17.2885 6.99898 17.2906C7.02798 17.2906 8.92398 17.3135 10.982 18.0562C10.389 18.7209 9.99998 19.7535 9.99998 20.9262C9.99998 22.9351 11.119 24.5618 12.5 24.5618C13.881 24.5618 15 22.9351 15 20.9262C15 20.7454 14.981 20.573 14.963 20.3995C14.976 20.3995 14.988 20.4068 15 20.4068C15.256 20.4068 15.512 20.305 15.707 20.1025C16.098 19.6963 16.098 19.0398 15.707 18.6337ZM29 15.2131C28.779 15.2131 23.549 15.2526 20.293 18.6337C19.902 19.0398 19.902 19.6963 20.293 20.1025C20.488 20.305 20.744 20.4068 21 20.4068C21.013 20.4068 21.024 20.3995 21.036 20.3995C21.02 20.573 21 20.7454 21 20.9262C21 22.9351 22.119 24.5618 23.5 24.5618C24.881 24.5618 26 22.9351 26 20.9262C26 19.7535 25.611 18.7209 25.018 18.0562C27.076 17.3135 28.972 17.2906 29.002 17.2906C29.553 17.2885 30 16.8232 29.999 16.2498C29.998 15.6775 29.552 15.2131 29 15.2131Z" fill="#292F33"/>
                            </svg>
                        </i>
                    </div>
                </div>

            </div>
            <div class="pa-15">
                <div class="alert warning">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="9" r="9" fill="#FFC611"/>
                        <path d="M9 14C11.7614 14 14 11.7614 14 9C14 6.23858 11.7614 4 9 4C6.23858 4 4 6.23858 4 9C4 11.7614 6.23858 14 9 14Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 7V9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 11H9.005" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {{ __("box.mood_rule") }}
                    @if((time() - $old_mark_time) < 43200)
                        <strong class="timer">{{ $mood_time }}</strong>
                    @endif
                </div>


            </div>


            <div class="detect-by-location pa-15">
                <label class="title">{{__("box.choose_clinic_via_gps")}}</label>
                <a href="javascript:;" id="getCoordinate" class="search-location">{{__("box.choose_via_gps")}}</a>
            </div>
            <div class="hospital-search pa-15" id="selected_place" hidden>
                <label class="title">{{__("box.choose_hospital")}}</label>
                <div class="hospital-list">
                  <span class="radio" >
                    <div id="main">
                      <strong></strong>
                      <p></p>
                    </div>
                  </span>

                </div>
            </div>
            <div class="hospital-search pa-15" id="select_place" hidden>
                <label class="title">{{__("box.choose_hospital")}}</label>
                <div class="hospital-list">
                  <span class="radio" id="selectRadio">
                    <div id="select_main">
                      <strong></strong>
                      <p></p>
                    </div>
                    <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M2 2L7.5 7L13 2" stroke="#007BEC" stroke-width="2.09549" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </span>
                    <ul>
                    @foreach($locations as $location)
                            <li data-id="{{ $location->id }}">
                                @if(app()->getLocale() == "uz")
                                    <strong>{{$location->uz_title}}</strong>
                                    <p>{{ $location->uz_region }}</p>
                                @elseif(app()->getLocale() == "ru")
                                    <strong>{{$location->ru_title}}</strong>
                                    <p>{{ $location->ru_region }}</p>
                                @elseif(app()->getLocale() == "cyrillic_uz")
                                    <strong>{{$location->cyrillic_uz_title}}</strong>
                                    <p>{{ $location->cyrillic_uz_region }}</p>
                                @endif
                            </li>

                    @endforeach
                        <li data-id="0">
                            <strong>{{ __("box.no_clinic_in_list") }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hospital-input-panel pa-15" id="no-clinic" hidden>
                <div class="hospital-input" >
                    <label class="title">{{__("box.describe_clinic")}}</label>
                    <input type="text" placeholder="{{ __("box.describe_your_clinic") }}" class="check-length validate" value="" name="clinic_desc" maxlength="100"/>
                    <div class="length-counter">100</div>
                </div>
            </div>

            <div class="confirm-hospital" hidden >
                <strong>{{__("box.is_it_your_hospital")}}</strong>
                <div class="confirm-buttons">
                    <a href="javascript:;" id="yesClinik"  class="primary">{{__("box.yes_it_is")}}</a>
                    <a href="javascript:;" id="notClinik">{{__("box.no_it_is_not")}}</a>
                </div>
            </div>
            <input type="text" id="locate" name="locate" class="validate" hidden>


            <div class="pa-15" >
                <div class="alert valid" style="display: none;background: rgba(255, 198, 17, 0.15); margin-bottom: 10px">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="9" r="9" fill="#FFC611"/>
                        <path d="M9 14C11.7614 14 14 11.7614 14 9C14 6.23858 11.7614 4 9 4C6.23858 4 4 6.23858 4 9C4 11.7614 6.23858 14 9 14Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 7V9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 11H9.005" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span></span>
                </div>
            </div>
            <div class="send-problem-button">
                <button type="submit" id="sendMood" disabled>{{__("box.send_signal")}}</button>
            </div>
        </form>
    </div>
    <div class="popup " id="createPopup">
        <div class="overlay"></div>
        <div class="popup-content">
            <strong>{{__("box.thanks_for_signal")}}</strong>
            <div class="locales">
                <a href="{{ route("survey.category") }}"class="btn">{{__('box.another_categories')}}</a>
                <a href="{{ route("survey.list",\Auth::user()->id) }}" class="btn">{{__("box.to_personal_account")}}</a>
            </div>
        </div>
    </div>

@endsection
@section("footer")
    @include("frontend.partials.footer")
@endsection
@section("js")

    <script>
        timer($(".timer"));
        lang = "{{ app()->getLocale() }}";
        var sound;

        var ratio = false;
        var opinion = false;
        var locate = false;
        var time = "";
		$(document).on("click",".overlay",function () {
            location = ("/survey/category");
        });

        $(".validate").change(function () {
            validate();
        });
        $("textarea").keyup(function () {
            validate();
        });
        $(".selectbox").change(function () {
            checkValidate();
        });



        function checkValidate(){
            let text = "";
            if(!ratio){
                text += "<a href='#rating' >{{ __("box.alert_rate_clinic") }}</a><br>";
            }
            if(!opinion){
                text += "<a href='#opinion' >{{ __("box.describe_problem") }}</a><br>";
            }
            if(!locate){
                text += "{{ __("box.choose_hospital") }}<br>";
            }
            if(text!= ""){
                $('.alert.valid span').html(text);
                $('.alert.valid').fadeIn();
            }
            else{
                $("#sendMood").removeAttr("disabled");
            }

        }
        $("#locate").change(function () {
            if($(this).val() == ""){
                $("#no-clinic").removeAttr("hidden")
            }
            else{
                $("#no-clinic").attr("hidden","hidden");
                locate = true;
                checkValidate()
            }
        });
        $("#no-clinic input").keyup(function () {
            if($("#locate").val() == ""){
                if($(this).val() == ""){
                    console.log("invalid");
                    locate = false;
                    checkValidate();
                }
                else{
                    console.log("valid");
                    locate = true;
                    checkValidate()
                }
            }
        });

        $('#surveyForm').on('submit', function(event){

            event.preventDefault();
            // $("#sendMood").attr("disabled","disabled");
            // $("#sendMood").text("Отправляется . . .");
            var data = new FormData(this);
            data.append('audio',sound);
            $.ajax({
                url: '{{ route("survey.store") }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                data: data,
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    $("#sendMood").text("{{__("box.send_signal")}}");
                    if(response == "redirect"){
                        window.location.replace("/survey/category");
                    }
                    else {
                        $("#createPopup").addClass("show");
                    }
                },
            });

        });
        $(document).on("keyup", ".check-length", function () {
            let lCounter =$(this).parent().find(".length-counter");
            let counter = 0;
            if($(this).attr("maxlength") == "100"){
                counter = 100;
            }
            else if($(this).attr("maxlength") == "1200"){
                counter = 1200;
            }
            $(lCounter).html(counter - $(this).val().length);
        });
    </script>
    <script src="/assets/js/recorder.js"></script>

@endsection
@section("css")
    <style>
        .text-area {
            position: relative;
        }
        .length-counter {
            position: absolute;
            right: 0;
            /*font-size: 4.5vmin;*/
        }
    </style>
@endsection
