@extends("admin.layout")
@section("content")

    <div class="center">
        <h1>{{__("Аҳоли сигналлари")}}</h1>
        <div class="filter-panel d-flex align-center">
            <a href="#">{{__("Барча сигналлар")}}</a>
            <form class="d-flex align-center" action="/export" method="get">
{{--                <div class="selectbox">--}}
{{--                    <select>--}}
{{--                        <option default value="" selected>{{__("box.problem_category")}}</option>--}}
{{--                        <option value="1">1</option>--}}
{{--                        <option value="2">2</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="selectbox">--}}
{{--                    <select>--}}
{{--                        <option default value="" selected>{{__("box.hospitals")}}</option>--}}
{{--                        <option value="1">1</option>--}}
{{--                        <option value="2">2</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="selectbox">--}}
{{--                    <select>--}}
{{--                        <option default value="" selected>{{__("box.category_mark")}}</option>--}}
{{--                        <option value="1">1</option>--}}
{{--                        <option value="2">2</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="selectbox">--}}
{{--                    <select>--}}
{{--                        <option default value="" selected>{{__("box.mood")}}</option>--}}
{{--                        <option value="1">1</option>--}}
{{--                        <option value="2">2</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="selectbox">--}}
{{--                    <select>--}}
{{--                        <option default value="" selected>{{__("box.gender")}}</option>--}}
{{--                        <option value="1">1</option>--}}
{{--                        <option value="2">2</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="selectbox">--}}
{{--                    <select>--}}
{{--                        <option default value="" selected>{{__("box.age")}}</option>--}}
{{--                        <option value="1">1</option>--}}
{{--                        <option value="2">2</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
                <button type="submit" id="export">{{__("Экспорт")}}</button>
            </form>
        </div>
    </div>
    <div class="content">
        <div class="table">
            <div class="table-header">
                <div class="center d-flex align-center">
                    <div class="table-head">{{__("Сана")}}</div>
                    <div class="table-head">{{__("Тоифа")}}</div>
                    <div class="table-head">{{__("Тоифа баҳоси")}}</div>
                    <div class="table-head">{{__("Тиббий муассаса")}}</div>
                    <div class="table-head">{{__("Жинси")}}</div>
                    <div class="table-head">{{__("Ёши")}}</div>
                    <div class="table-head">{{__("Кайфияти")}}</div>
                    <div class="table-head">ID</div>
					<div class="table-head">{{__("Фойдаланувчи")}}</div>
                    <div class="table-head">&nbsp;</div>
                </div>
            </div>
            <div class="table-body">
                <div class="table-row">
                    @foreach($surveys as $survey)
                    <div class="center "  >
                        <a href="javascript:" class="d-flex align-center choose-survey {{ ($survey->read == 1) ? "unreadActive" : "" }}" data="{{$survey->id}}">
                            <div class="table-head" {{ ($survey->location_id == 0) ? "style=color:red;" : "" }}>{{date("d.m.Y H:i", strtotime(date($survey->created_at)))}}</div>
                            <div class="table-head" {{ ($survey->location_id == 0) ? "style=color:red;" : "" }}>
                                    {{$survey->category->cyrillic_uz_name}}
                            </div>
                            <div class="table-head" {{ ($survey->location_id == 0) ? "style=color:red;" : "" }}>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $survey->rank)
                                        <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.0825 2.6574C12.4307 1.85452 13.5693 1.85452 13.9175 2.6574L16.2954 8.14107C16.4403 8.47522 16.7554 8.70417 17.118 8.73872L23.068 9.3057C23.9392 9.38871 24.2911 10.4716 23.6351 11.0508L19.1546 15.0069C18.8816 15.2479 18.7612 15.6184 18.8404 15.9739L20.1398 21.808C20.3301 22.6621 19.409 23.3314 18.6554 22.8865L13.5084 19.8478C13.1948 19.6627 12.8052 19.6627 12.4916 19.8478L7.34463 22.8865C6.59104 23.3314 5.6699 22.6621 5.86015 21.808L7.1596 15.9739C7.23878 15.6184 7.11842 15.2479 6.8454 15.0069L2.36494 11.0508C1.70894 10.4716 2.06079 9.38871 2.93196 9.3057L8.88204 8.73872C9.24462 8.70417 9.55974 8.47522 9.70464 8.14107L12.0825 2.6574Z" fill="#FFD365" stroke="#FFD365" stroke-width="3"/>
                                        </svg>
                                    @else
                                        <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.0825 2.6574C12.4307 1.85452 13.5693 1.85452 13.9175 2.6574L16.2954 8.14107C16.4403 8.47522 16.7554 8.70417 17.118 8.73872L23.068 9.3057C23.9392 9.38871 24.2911 10.4716 23.6351 11.0508L19.1546 15.0069C18.8816 15.2479 18.7612 15.6184 18.8404 15.9739L20.1398 21.808C20.3301 22.6621 19.409 23.3314 18.6554 22.8865L13.5084 19.8478C13.1948 19.6627 12.8052 19.6627 12.4916 19.8478L7.34463 22.8865C6.59104 23.3314 5.6699 22.6621 5.86015 21.808L7.1596 15.9739C7.23878 15.6184 7.11842 15.2479 6.8454 15.0069L2.36494 11.0508C1.70894 10.4716 2.06079 9.38871 2.93196 9.3057L8.88204 8.73872C9.24462 8.70417 9.55974 8.47522 9.70464 8.14107L12.0825 2.6574Z" fill="#989898" stroke="#989898" stroke-width="3"/>
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                            <div class="table-head" {{ ($survey->location_id == 0) ? "style=color:red;" : "" }}>
                                @if($survey->location_id == 0)
                                    {{ $survey->clinic_desc }}
                                @else
                                    {{$survey->location->cyrillic_uz_title}}
                                @endif
                            </div>
                            <div class="table-head" {{ ($survey->location_id == 0) ? "style=color:red;" : "" }}>
                                @if(!empty($survey->user))

                                    @if($survey->user->gender == "1")
                                        {{__("Эркак")}}
                                    @elseif($survey->user->gender == "2")
                                        {{__("Аёл")}}
                                    @endif
                                @endif
                            </div>
                            <div class="table-head" {{ ($survey->location_id == 0) ? "style=color:red;" : "" }}>
                                {{( !empty($survey->user)) ? date("Y", time())-date("Y", strtotime($survey->user->birth)) : ""}} {{__("ёш")}}
                            </div>
                            <div class="table-head" {{ ($survey->location_id == 0) ? "style=color:red;" : "" }}>
                                <?php
                                $mood = new \App\Mood();
                                $res = $mood->getMood($survey->user_id,$survey->created_at);
                                if ($res) {
                                    switch ($res->rank) {
                                        case 1:
                                            echo __("Ғазабли");
                                            break;
                                        case 2:
                                            echo __("Қайғули");
                                            break;
                                        case 3:
                                            echo __("Ваҳимали");
                                            break;
                                        case 4:
                                            echo __("Осойишта");
                                            break;
                                        case 5:
                                            echo __("Хурсанд");
                                            break;
                                    }
                                }
                                ?>
                            </div>
                            <div class="table-head" {{ ($survey->location_id == 0) ? "style=color:red;" : "" }}>
                                <span class="tags">A-{{$survey->id}}</span>
                            </div>
							<div class="table-head" {{ ($survey->location_id == 0) ? "style=color:red;" : "" }}>
								@if($survey->user)
									{{$survey->user->id}}
								@endif
                            </div>
                            <div class="table-head" {{ ($survey->location_id == 0) ? "style=color:red;" : "" }}>
                    <span class="button">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 10L10 10M1 10L10 10M10 10L10 19M10 10L10 1.00001" stroke="#08090A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <div class="hide caption" id="caption">
                        <div class="center  d-flex align-center">
                            <div class="left-side">
                                <strong>{{__("Муаммо тавсифи")}}</strong>
                                <p class="problem-box"></p>
                            </div>
                            <div class="right-side">
                                <strong>{{__("Юкланган файллар")}}</strong>
                                <div class="pictures d-flex align-center files">

                                </div>
                                <strong>{{__("Юкланган файллар")}}</strong>
                                <div class="player">
                                    <div class="thumbs">
                                        <a href="javascript:;" id="btnStart" class="playingbutton">
                                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 5.66667V8.33333C0 11.3105 0 12.799 0.971008 13.3817C1.94202 13.9643 3.25546 13.2638 5.88235 11.8627L8.38235 10.5294C11.2941 8.97647 12.75 8.2 12.75 7C12.75 5.8 11.2941 5.02353 8.38235 3.47059L5.88235 2.13725C3.25546 0.736246 1.94202 0.0357424 0.971008 0.618348C0 1.20095 0 2.68952 0 5.66667Z" fill="#000"/>
                                            </svg>
                                        </a>
                                        <div class="line" id="waveform" style="background: none"></div>
                                    </div>
                                </div>
                                <div class="no-audio"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script src="{{ asset("js/wavesurfer.js") }}"></script>
    <script>
        var surveyId;

        let wave = document.getElementById('waveform');
        var wavesurfer = WaveSurfer.create({
            container: '#waveform',
            waveColor: 'lightskyblue',
            progressColor: 'skyblue',
            height: 20,
            barGap: 5
        });
        let isStart = false;

        // vidSave.src = audioURL;
        $("#btnStart").click(function () {
            if(isStart){
                wavesurfer.stop();
                $(this).removeClass("active");
                isStart = false;
            }
            else{
                wavesurfer.play();
                $(this).addClass("active");
                isStart = true;
            }
        });
        wavesurfer.on('pause', function () {
            isStart = false;
            $("#btnStart").removeClass("active");
        });

        $(document).on("click", ".choose-survey", function () {
            let thisElem = $(this);
            if($("#caption").hasClass("active") && $(this).attr("data") == surveyId) {
                $("#caption").removeClass("active");
            }
            else {
                let thisBlock = $(this).parent();
                let data = {
                    "_token":   "{{csrf_token()}}",
                    "id":       $(this).attr("data"),
                };
                $.post("{{route("admin.selectSurvey")}}", data, function (response) {
                    if(response.status == "success") {
                        if (response.audio != null) {
                            wavesurfer.load("/storage/files/"+ response.audio);
                            $(".player").removeClass("hidden");
                            $(".no-audio").html("");
                        }
                        else {
                            $(".player").addClass("hidden");
                            $(".no-audio").html("Файл юкланмаган");
                        }
                        thisElem.removeClass("unreadActive");
                        let problemBox  = $(".problem-box"),
                            photos      = $(".files");
                        problemBox.html(response.survey.opinion);
                        photos.html("");
                        let text = "";
                        if(response.photo.length != 0) {
                            $.each(response.photo, function (key, item) {
                                text += "<a href='" + item.path + "/" + item.name + "' data-fancybox='gallery'><img src='" + item.path + "/" + item.name + "' alt=''/></a>";

                            });
                            // /storage/files/images/IMG_20200727_224556.jpg
                            text += "<a href='/storage/archives/"+ response.zipFile +"' download class='download-all' style=\"text-align: center\">\n" +
                                '<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                                '<path fill-rule="evenodd" clip-rule="evenodd" d="M12.6364 18.8636C12.2849 18.5121 11.7151 18.5121 11.3636 18.8636C11.0121 19.2151 11.0121 19.7849 11.3636 20.1364L17.3636 26.1364C17.5324 26.3052 17.7613 26.4 18 26.4C18.2387 26.4 18.4676 26.3052 18.6364 26.1364L24.6364 20.1364C24.9879 19.7849 24.9879 19.2151 24.6364 18.8636C24.2849 18.5121 23.7151 18.5121 23.3636 18.8636L18.9 23.3272V10.5H25C27.7614 10.5 30 12.7386 30 15.5V28C30 30.7614 27.7614 33 25 33H11C8.23858 33 6 30.7614 6 28V15.5C6 12.7386 8.23858 10.5 11 10.5H17.1V23.3272L12.6364 18.8636ZM17.1 10.5V4.50001C17.1 4.00295 17.5029 3.60001 18 3.60001C18.4971 3.60001 18.9 4.00295 18.9 4.50001V10.5H17.1Z" fill="white"/>\n' +
                                '</svg>\n' +
                                '{{__("Файлларни юклаб олиш")}}\n' +
                                '</a>';
                            photos.append(text);
                        }
                        else {
                            photos.append("Файл юкланмаган");
                        }
                        $("#caption").addClass("active");
                        $("#caption").appendTo(thisBlock);
                    }
                });
            }
            surveyId = $(this).attr("data");
        });
    </script>
@endsection
@section("css")
    <style>
        .hidden {
            display: none!important;
        }
    </style>
@endsection
