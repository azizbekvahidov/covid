<header>
    <div class="center-content d-flex align-center">
        <div class="logo">
            <a href="/">Sogboling.uz</a>
        </div>
        <div class="right-side">
            <a href="#" class="header-links">{{ __("box.how_to_use_service") }}</a>
            <a href="#" class="header-links">{{ __("box.about_project") }}</a>

            <div class="lang-switcher">
                @if(app()->getLocale() == "uz")
                    <a href="javascript:;" class="uz mobile">Uz</a>
                @elseif(app()->getLocale() == "ru")
                    <a href="javascript:;" class="uz mobile">Ру</a>
                @elseif(app()->getLocale() == "cyrillic_uz")
                    <a href="javascript:;" class="uz mobile">Ўз</a>
                @endif
                    <ul class="desktop">
                        <li>
                            @if(app()->getLocale() == "uz")
                                <a href="javascript:;" class="dropdown">Uz</a>
                            @elseif(app()->getLocale() == "ru")
                                <a href="javascript:;" class="dropdown">Ру</a>
                            @elseif(app()->getLocale() == "cyrillic_uz")
                                <a href="javascript:;" class="dropdown">Ўз</a>
                            @endif
                            <ul>
                                <li><a href="/locale/uz">O‘zbekcha</a> </li>
                                <li><a href="/locale/cyrillic_uz">Ўзбекча</a> </li>
                                <li><a href="/locale/ru">Русский</a> </li>
                            </ul>
                        </li>
                    </ul>
            </div>
            @if( \Request::is("/"))
            <div class="header-search">
                <form>
                    <input type="text" value="" name=""/>
                    <a href="#" class="clear">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.13892L7.99999 8.16103M7.99999 8.16103L15 15.1832M7.99999 8.16103L15 1.13892M7.99999 8.16103L1 15.1832" stroke="#313B6C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </form>
                <a href="#">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 8.57109C0 3.83741 3.83741 0 8.57109 0C13.3048 0 17.1422 3.83741 17.1422 8.57109C17.1422 13.3048 13.3048 17.1422 8.57109 17.1422C3.83741 17.1422 0 13.3048 0 8.57109ZM15.2375 8.57112C15.2375 4.88937 12.2529 1.90472 8.57112 1.90472C4.88937 1.90472 1.90472 4.88937 1.90472 8.57112C1.90472 12.2529 4.88937 15.2375 8.57112 15.2375C12.2529 15.2375 15.2375 12.2529 15.2375 8.57112Z" fill="#100F0F"/>
                        <path d="M13.6745 13.554C14.0784 13.2171 14.679 13.2715 15.0158 13.6755L19.7783 19.3866C20.1151 19.7906 20.0607 20.3911 19.6568 20.7279C19.2528 21.0648 18.6523 21.0104 18.3154 20.6064L13.553 14.8953C13.2161 14.4913 13.2705 13.8908 13.6745 13.554Z" fill="#100F0F"/>
                    </svg>
                </a>
            </div>
            @endif
            @if(!\Auth::user())
                <a href="{{ route("login") }}" class="btn signin">{{ __("box.login") }}</a>
            @else
                <div class="user">
                    <ul>
                        <li>
                            <div class="d-flex align-center">
                                <img src="{{ asset((\Auth::user()->photo == "" || \Auth::user()->photo == null) ? "assets/img/user-empty.png" : "storage/avatars/".\Auth::user()->photo)}}" alt=""/>
                                <div>
                                    <a href="{{ route("survey.list") }}" class="user-link">{{\Auth::user()->FIO}}</a>
                                    <a href="{{ route("logout") }}" class="logout">{{ __("box.logout") }}</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="burger">
                <a href="#">
                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1" y1="1" x2="19" y2="1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <line x1="9" y1="8" x2="19" y2="8" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <line x1="1" y1="15" x2="19" y2="15" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

</header>
