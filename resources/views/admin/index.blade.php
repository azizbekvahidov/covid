
@extends("admin.layout")
@section("content")
    <div class="center">
        <h1>{{__("box.residents_signals")}}</h1>
        <div class="filter-panel d-flex align-center">
            <a href="#">{{__("box.all_signals")}}</a>
            <form class="d-flex align-center" action="" method="get">
                <div class="selectbox">
                    <select>
                        <option default value="" selected>{{__("box.problem_category")}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="selectbox">
                    <select>
                        <option default value="" selected>{{__("box.hospitals")}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="selectbox">
                    <select>
                        <option default value="" selected>{{__("box.category_mark")}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="selectbox">
                    <select>
                        <option default value="" selected>{{__("box.mood")}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="selectbox">
                    <select>
                        <option default value="" selected>{{__("box.gender")}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="selectbox">
                    <select>
                        <option default value="" selected>{{__("box.age")}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <button type="submit">{{__("box.export")}}</button>
            </form>
        </div>
    </div>
    <div class="content">
        <div class="table">
            <div class="table-header">
                <div class="center d-flex align-center">
                    <div class="table-head">{{__("box.date")}}</div>
                    <div class="table-head">{{__("box.category")}}</div>
                    <div class="table-head">{{__("box.category_mark")}}</div>
                    <div class="table-head">{{__("box.hospitals")}}</div>
                    <div class="table-head">{{__("box.gender")}}</div>
                    <div class="table-head">{{__("box.age")}}</div>
                    <div class="table-head">{{__("box.mood")}}</div>
                    <div class="table-head">ID</div>
                    <div class="table-head">&nbsp;</div>
                </div>
            </div>
            <div class="table-body">
                <div class="table-row">
                    @foreach($surveys as $survey)
                    <div class="center">
                        <a href="#" class=" d-flex align-center">
                            <div class="table-head">{{date("d.m.Y", strtotime(date($survey->created_at)))}}</div>
                            <div class="table-head">
                                @if(app()->getLocale() == "uz")
                                    {{$survey->category->uz_name}}
                                @elseif(app()->getLocale() == "ru")
                                    {{$survey->category->ru_name}}
                                @endif
                            </div>
                            <div class="table-head">
                                <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0825 2.6574C12.4307 1.85452 13.5693 1.85452 13.9175 2.6574L16.2954 8.14107C16.4403 8.47522 16.7554 8.70417 17.118 8.73872L23.068 9.3057C23.9392 9.38871 24.2911 10.4716 23.6351 11.0508L19.1546 15.0069C18.8816 15.2479 18.7612 15.6184 18.8404 15.9739L20.1398 21.808C20.3301 22.6621 19.409 23.3314 18.6554 22.8865L13.5084 19.8478C13.1948 19.6627 12.8052 19.6627 12.4916 19.8478L7.34463 22.8865C6.59104 23.3314 5.6699 22.6621 5.86015 21.808L7.1596 15.9739C7.23878 15.6184 7.11842 15.2479 6.8454 15.0069L2.36494 11.0508C1.70894 10.4716 2.06079 9.38871 2.93196 9.3057L8.88204 8.73872C9.24462 8.70417 9.55974 8.47522 9.70464 8.14107L12.0825 2.6574Z" fill="#FFD365" stroke="#FFD365" stroke-width="3"/>
                                </svg>
                                <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0825 2.6574C12.4307 1.85452 13.5693 1.85452 13.9175 2.6574L16.2954 8.14107C16.4403 8.47522 16.7554 8.70417 17.118 8.73872L23.068 9.3057C23.9392 9.38871 24.2911 10.4716 23.6351 11.0508L19.1546 15.0069C18.8816 15.2479 18.7612 15.6184 18.8404 15.9739L20.1398 21.808C20.3301 22.6621 19.409 23.3314 18.6554 22.8865L13.5084 19.8478C13.1948 19.6627 12.8052 19.6627 12.4916 19.8478L7.34463 22.8865C6.59104 23.3314 5.6699 22.6621 5.86015 21.808L7.1596 15.9739C7.23878 15.6184 7.11842 15.2479 6.8454 15.0069L2.36494 11.0508C1.70894 10.4716 2.06079 9.38871 2.93196 9.3057L8.88204 8.73872C9.24462 8.70417 9.55974 8.47522 9.70464 8.14107L12.0825 2.6574Z" fill="#FFD365" stroke="#FFD365" stroke-width="3"/>
                                </svg>
                                <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0825 2.6574C12.4307 1.85452 13.5693 1.85452 13.9175 2.6574L16.2954 8.14107C16.4403 8.47522 16.7554 8.70417 17.118 8.73872L23.068 9.3057C23.9392 9.38871 24.2911 10.4716 23.6351 11.0508L19.1546 15.0069C18.8816 15.2479 18.7612 15.6184 18.8404 15.9739L20.1398 21.808C20.3301 22.6621 19.409 23.3314 18.6554 22.8865L13.5084 19.8478C13.1948 19.6627 12.8052 19.6627 12.4916 19.8478L7.34463 22.8865C6.59104 23.3314 5.6699 22.6621 5.86015 21.808L7.1596 15.9739C7.23878 15.6184 7.11842 15.2479 6.8454 15.0069L2.36494 11.0508C1.70894 10.4716 2.06079 9.38871 2.93196 9.3057L8.88204 8.73872C9.24462 8.70417 9.55974 8.47522 9.70464 8.14107L12.0825 2.6574Z" fill="#FFD365" stroke="#FFD365" stroke-width="3"/>
                                </svg>
                                <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0825 2.6574C12.4307 1.85452 13.5693 1.85452 13.9175 2.6574L16.2954 8.14107C16.4403 8.47522 16.7554 8.70417 17.118 8.73872L23.068 9.3057C23.9392 9.38871 24.2911 10.4716 23.6351 11.0508L19.1546 15.0069C18.8816 15.2479 18.7612 15.6184 18.8404 15.9739L20.1398 21.808C20.3301 22.6621 19.409 23.3314 18.6554 22.8865L13.5084 19.8478C13.1948 19.6627 12.8052 19.6627 12.4916 19.8478L7.34463 22.8865C6.59104 23.3314 5.6699 22.6621 5.86015 21.808L7.1596 15.9739C7.23878 15.6184 7.11842 15.2479 6.8454 15.0069L2.36494 11.0508C1.70894 10.4716 2.06079 9.38871 2.93196 9.3057L8.88204 8.73872C9.24462 8.70417 9.55974 8.47522 9.70464 8.14107L12.0825 2.6574Z" fill="#FFD365" stroke="#FFD365" stroke-width="3"/>
                                </svg>
                                <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0825 2.6574C12.4307 1.85452 13.5693 1.85452 13.9175 2.6574L16.2954 8.14107C16.4403 8.47522 16.7554 8.70417 17.118 8.73872L23.068 9.3057C23.9392 9.38871 24.2911 10.4716 23.6351 11.0508L19.1546 15.0069C18.8816 15.2479 18.7612 15.6184 18.8404 15.9739L20.1398 21.808C20.3301 22.6621 19.409 23.3314 18.6554 22.8865L13.5084 19.8478C13.1948 19.6627 12.8052 19.6627 12.4916 19.8478L7.34463 22.8865C6.59104 23.3314 5.6699 22.6621 5.86015 21.808L7.1596 15.9739C7.23878 15.6184 7.11842 15.2479 6.8454 15.0069L2.36494 11.0508C1.70894 10.4716 2.06079 9.38871 2.93196 9.3057L8.88204 8.73872C9.24462 8.70417 9.55974 8.47522 9.70464 8.14107L12.0825 2.6574Z" fill="#FFD365" stroke="#FFD365" stroke-width="3"/>
                                </svg>
                            </div>
                            <div class="table-head">{{$survey->location->location_title}}</div>
                            <div class="table-head">
                                @if(\Auth::user()->gender == "1")
                                {{__("box.male")}}
                                @elseif(\Auth::user()->gender == "2")
                                {{__("box.female")}}
                                @endif
                            </div>
                            <div class="table-head">
                                {{date("Y", time())-date("Y", strtotime(\Auth::user()->birth))}} {{__("box.years_old")}}
                            </div>
                            <div class="table-head">Радостное</div>
                            <div class="table-head">
                                <span class="tags">A-{{$survey->id}}</span>
                            </div>
                            <div class="table-head">
                    <span class="button">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 10L10 10M1 10L10 10M10 10L10 19M10 10L10 1.00001" stroke="#08090A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <div class="hide caption active">
                        <div class="center  d-flex align-center">
                            <div class="left-side">
                                <strong>Описание проблемы</strong>
                                <p>Здравствуйте! Мы, жители города Ташкента, проживающие по улице Мустакиллик, дом 90, были бы признательны, если в нашем дворе создали бы детскую спортивную площадку. Мы живем здесь 15 лет, но в нашем дворе и по близости нет ни одной развлекательной зоны для детей. Было бы здорово, если в нашем дворе помогли бы создать хотя бы маленькую площадку </p>
                                <p>У нас во дворе есть место, где который год собирается мусор. Дети сидят дома, так как им негде играть. Сидя дома на карантине очень сложно их чем-то занять. Если поможете в этом вопросе были бы сильно благодарны. У нас многоэтажка, 6 подъездов и очень много детей.  Спасибо за понимание! С уважением, Махбуба!</p>
                            </div>
                            <div class="right-side">
                                <strong>{{__("box.attached_files")}}</strong>
                                <div class="pictures d-flex align-center">
                                    <a href="#"><img src="img/img2.jpg" alt=""/> </a>
                                    <a href="#"><img src="img/img2.jpg" alt=""/> </a>
                                    <a href="#"><img src="img/img2.jpg" alt=""/> </a>
                                    <a href="#"><img src="img/img2.jpg" alt=""/> </a>
                                    <a href="#" class="download-all">
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6364 18.8636C12.2849 18.5121 11.7151 18.5121 11.3636 18.8636C11.0121 19.2151 11.0121 19.7849 11.3636 20.1364L17.3636 26.1364C17.5324 26.3052 17.7613 26.4 18 26.4C18.2387 26.4 18.4676 26.3052 18.6364 26.1364L24.6364 20.1364C24.9879 19.7849 24.9879 19.2151 24.6364 18.8636C24.2849 18.5121 23.7151 18.5121 23.3636 18.8636L18.9 23.3272V10.5H25C27.7614 10.5 30 12.7386 30 15.5V28C30 30.7614 27.7614 33 25 33H11C8.23858 33 6 30.7614 6 28V15.5C6 12.7386 8.23858 10.5 11 10.5H17.1V23.3272L12.6364 18.8636ZM17.1 10.5V4.50001C17.1 4.00295 17.5029 3.60001 18 3.60001C18.4971 3.60001 18.9 4.00295 18.9 4.50001V10.5H17.1Z" fill="white"/>
                                        </svg>
                                        {{__("box.download_files")}}
                                    </a>
                                </div>
                                <strong>{{__("box.attached_files")}}</strong>
                                <div class="player">
                                    <div class="thumbs">
                                        <a href="#" class="playingbutton">
                                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 5.66667V8.33333C0 11.3105 0 12.799 0.971008 13.3817C1.94202 13.9643 3.25546 13.2638 5.88235 11.8627L8.38235 10.5294C11.2941 8.97647 12.75 8.2 12.75 7C12.75 5.8 11.2941 5.02353 8.38235 3.47059L5.88235 2.13725C3.25546 0.736246 1.94202 0.0357424 0.971008 0.618348C0 1.20095 0 2.68952 0 5.66667Z" fill="#000"/>
                                            </svg>
                                        </a>
                                        <div class="line"></div>
                                    </div>
                                    <div class="playing"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
