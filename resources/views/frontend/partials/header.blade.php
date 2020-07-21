<header>
    <div class="logo">
        <a href="/">Sogboling.uz</a>
    </div>
    @if(!\Auth::user())
        @if($_SERVER['REQUEST_URI'] == "/")
            <div class="burger">
                <a href="javascript:">
                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1" y1="1" x2="19" y2="1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <line x1="9" y1="8" x2="19" y2="8" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <line x1="1" y1="15" x2="19" y2="15" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
        @endif
    @else
        <div class="burger">
            <a href="javascript:">
                <img src="/assets/img/image%201.png" alt=""/>
            </a>
        </div>
    @endif
</header>
