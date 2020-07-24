<header>
    <div class="logo">
        <a href="/">Sogboling.uz</a>
    </div>
{{--        <div class="">--}}
{{--            <a href="{{ route("survey.list")}}">--}}
{{--                <img src="/assets/img/image%201.png" alt=""/>--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="right-side">
            <div class="lang-switcher">
                @if(app()->getLocale() == "ru")
                    <a href="/locale/uz" class="uz">Uz</a>
                @elseif(app()->getLocale() == "uz")
                    <a href="/locale/ru" class="uz">Ru</a>
                @endif
            </div>
            <div class="burger">
                <a href="#" {{ (\Auth::check()) ? "" : "data-target='.auth' data-auth"  }}>
                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1" y1="1" x2="19" y2="1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <line x1="9" y1="8" x2="19" y2="8" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <line x1="1" y1="15" x2="19" y2="15" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
        </div>
</header>
