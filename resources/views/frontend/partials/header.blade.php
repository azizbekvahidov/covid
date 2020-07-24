<header>
    @if($_SERVER['REQUEST_URI'] == "/")
        <div class="lang-switcher">
            <a href="/locale/uz" class="uz">O‘zbekcha</a>
            <a href="/locale/ru" class="ru">Русский</a>
        </div>
    @else
        <div class="logo">
            <a href="/">Sogboling.uz</a>
        </div>
        <div class="">
            <a href="{{ route("survey.list")}}">
                <img src="/assets/img/image%201.png" alt=""/>
            </a>
        </div>
    @endif
</header>
