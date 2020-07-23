@extends("frontend.layout")
@section("title", " —")
@section("content")
    @include("errors")
<div class="problems-content content">
    <div class="problems-detail ">
        <div class="bordered">
            <div class="pa-15">
                <a href="{{ route("survey.list", $user->id) }}" class="back">
                    <i>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM16 7L0.999999 7V9L16 9V7Z" fill="black"/>
                        </svg>
                    </i>
                    <div class="info">
                        <strong>
                            @if(app()->getLocale() == "uz")
                                {{$survey->category->uz_name}}
                            @elseif(app()->getLocale() == "ru")
                                {{$survey->category->ru_name}}
                            @endif
                        </strong>
                        <span class="tags">ID A-{{ $survey->id }}</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="pa-15">
            <div class=" bordered">
                <div class="info-rating">
                    <div class="mr-70">
                        <span>Дата:</span>
                        <strong>{{ date("d.m.Y H:i",strtotime($survey->created_at)) }}</strong>
                    </div>
                    <div>
                        <span>Оценка:</span>
                        <div class="rating">
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
                    </div>
                </div>
            </div>
            <div class=" bordered">
                <div class="caption">
                    <strong>{{ __("box.describing_problem") }}:</strong>
                    <p>
                        {{ $survey->opinion }}
                    </p>
                </div>
            </div>
            <div class=" bordered">
                <div class="info-rating">
                    <div>
                        <span>Вложенные фото:</span>
                        <div class="fileUpload">
                            @foreach($survey->files as $val)
                                <div class="thumbs active">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.863 0.175073C13.2583 0.175073 12.768 0.665347 12.768 1.27013V12.7679H1.26982C0.665038 12.7679 0.174765 13.2582 0.174765 13.863C0.174765 14.4678 0.665039 14.958 1.26982 14.958H12.768V26.4564C12.768 27.0612 13.2583 27.5515 13.863 27.5515C14.4678 27.5515 14.9581 27.0612 14.9581 26.4564V14.958H26.4561C27.0609 14.958 27.5512 14.4678 27.5512 13.863C27.5512 13.2582 27.0609 12.7679 26.4561 12.7679H14.9581V1.27013C14.9581 0.665346 14.4678 0.175073 13.863 0.175073Z" fill="#B2B7D0"/>
                                    </svg>
                                    <div class="preview active">
                                        <img src="{{ asset($val->path."/".$val->name) }}" alt="" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @if($survey->audio != null)
            <div class="info-rating">
                <div class="audio">
                    <span>Прослушать аудио:</span>
                    <div class="player">
                        <div class="thumbs">
                            <a href="#" class="playingbutton " id="btnStart">
                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 5.66667V8.33333C0 11.3105 0 12.799 0.971008 13.3817C1.94202 13.9643 3.25546 13.2638 5.88235 11.8627L8.38235 10.5294C11.2941 8.97647 12.75 8.2 12.75 7C12.75 5.8 11.2941 5.02353 8.38235 3.47059L5.88235 2.13725C3.25546 0.736246 1.94202 0.0357424 0.971008 0.618348C0 1.20095 0 2.68952 0 5.66667Z" fill="#007BEC"/>
                                </svg>
                            </a>
                            <div class="line " id="waveform" style="background: none"></div>
    {{--                            <a href="#">--}}
    {{--                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
    {{--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0001 2.10001C9.39847 2.10001 8.1001 3.39838 8.1001 5.00001V5.10001H5.0001H4.0001C3.50304 5.10001 3.1001 5.50295 3.1001 6.00001C3.1001 6.49706 3.50304 6.90001 4.0001 6.90001H5.0001H5.30894L6.13436 19.1715L6.13448 19.1735C6.226 20.6219 7.42747 21.75 8.879 21.75H15.1212C16.5727 21.75 17.7741 20.6219 17.8657 19.1736L17.8658 19.1715L18.6913 6.90001H19.0001H20.0001C20.4972 6.90001 20.9001 6.49706 20.9001 6.00001C20.9001 5.50295 20.4972 5.10001 20.0001 5.10001H19.0001H15.9001V5.00001C15.9001 3.39838 14.6017 2.10001 13.0001 2.10001H11.0001ZM14.1001 5.10001H9.9001V5.00001C9.9001 4.39249 10.3926 3.90001 11.0001 3.90001H13.0001C13.6076 3.90001 14.1001 4.39249 14.1001 5.00001V5.10001ZM10.5993 9.96147C10.578 9.46487 10.1582 9.07955 9.66156 9.10083C9.16496 9.12211 8.77964 9.54194 8.80092 10.0385L9.10092 17.0385C9.12221 17.5351 9.54203 17.9205 10.0386 17.8992C10.5352 17.8779 10.9206 17.4581 10.8993 16.9615L10.5993 9.96147ZM15.1993 10.0385C15.2206 9.54194 14.8352 9.12211 14.3386 9.10083C13.842 9.07955 13.4222 9.46487 13.4009 9.96147L13.1009 16.9615C13.0796 17.4581 13.465 17.8779 13.9616 17.8992C14.4582 17.9205 14.878 17.5351 14.8993 17.0385L15.1993 10.0385Z" fill="#EF006D"/>--}}
    {{--                                </svg>--}}
    {{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section("footer")
@include("frontend.partials.footer")
@endsection

@section("js")
    <script>
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
        wavesurfer.load("{{ asset("/storage/files/".$survey->audio) }}");
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

    </script>
@endsection
