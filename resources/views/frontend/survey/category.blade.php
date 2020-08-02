@extends("frontend.layout")
@section("title", "")
@section("content")
    <div class="center-content">
        <div class="pa-15">
            <div class="category-panel">
                <strong>{{__("box.do_message_problem")}}</strong>
                <span>{{__("box.choose_category")}}</span>
                @include("message")

                <div>
                @foreach($categories as $category)

                    @php
                        $survey = \Auth::check() ? \App\Survey::where("user_id", \Auth::user()->id)->where("category_id", $category->id)->orderBy("id", "desc")->first() : null;

                    @endphp
                    @if (!is_null($survey))
                    @php

                        $date = strtotime(date($survey->created_at));
                        $res = "";
                        if(time()-$date < 43200){
                            $diff = 42300 - (time()-$date);

                            $sec = ($diff % 60 < 10) ? "0".$diff % 60 : $diff % 60;
                            $minute = ($diff / 60 % 60 < 10) ? "0".($diff / 60 % 60 ) : $diff / 60 % 60  ;
                            $hour = $diff / 3600 % 24;
                            $res = $hour.":".$minute.":".$sec;
                        }
                    @endphp
                        <div class="category-item">
                            <a href="{{ route("survey.create",$category->id) }}"  class="link {{ ($res != "") ? 'disabled' : "" }}" time="{{$date}}">
                                @if($res != "")
                                    <div class="countdown">
                                        <span class="timer" >{{ $res }}</span>
                                    </div>
                                @endif
                                <?=$category->icon ?>

                                @if(app()->getLocale() == "uz")
                                    <strong>{{$category->uz_name}}</strong>
                                @elseif(app()->getLocale() == "ru")
                                    <strong>{{$category->ru_name}}</strong>
                                @elseif(app()->getLocale() == "cyrillic_uz")
                                    <strong>{{$category->cyrillic_uz_name}}</strong>
                                @endif
                                <p>Создание информационной системы «Единая электронная медицинская карта» для формирования и хранения общих сведений.</p>
                            </a>
                        </div>

                    @else
                        <div class="category-item">
                            <a href="{{ \Auth::check() ? route("survey.create",$category->id) : route("register.verifyPhone") }}" class="link" time="" {{\Auth::check() ? "" : 'data-target=.auth data-auth'}}>

                                <?=$category->icon ?>

                                @if(app()->getLocale() == "uz")
                                    <strong>{{$category->uz_name}}</strong>
                                @elseif(app()->getLocale() == "ru")
                                    <strong>{{$category->ru_name}}</strong>
                                @elseif(app()->getLocale() == "cyrillic_uz")
                                    <strong>{{$category->cyrillic_uz_name}}</strong>
                                @endif
                                <p>Создание информационной системы «Единая электронная медицинская карта» для формирования и хранения общих сведений.</p>
                            </a>
                        </div>
                    @endif
                @endforeach
                </div>
                <div class="alert error">
                    <i>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 8V12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 16H12.01" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </i>
                    {{ __("box.category_rule") }}
                </div>

            </div>
        </div>
    </div>
@endsection
@section("footer")
    @include("frontend.partials.footer")
@endsection()
@section("js")
    <script>
        $(".timer").each(function () {
            timer(this);

        })
        $(document).on("click", ".link", function (e) {
            let now = Math.floor(new Date()/1000),
                time = $(this).attr("time");
            if (now - time < 43200) {
                e.preventDefault();
                // let block = "<span>"  "</span>";

            }
        });
        </script>
@endsection
