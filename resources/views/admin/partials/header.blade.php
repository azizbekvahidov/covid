<header>
    <div class="center d-flex justify-spacebetween align-center">
        <div class="logo">
            <a href="#">Sogboling.uz</a>
        </div>
        <div class="header-serach">
            <form action="" method="get">
                <input type="text" placeholder="Укажите ключевое слово или словосочетание, характеризующее проблему..." value="" name="">
                <button type="submit">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 8.57109C0 3.83741 3.83741 0 8.57109 0C13.3048 0 17.1422 3.83741 17.1422 8.57109C17.1422 13.3048 13.3048 17.1422 8.57109 17.1422C3.83741 17.1422 0 13.3048 0 8.57109ZM15.2375 8.57112C15.2375 4.88937 12.2529 1.90472 8.57112 1.90472C4.88937 1.90472 1.90472 4.88937 1.90472 8.57112C1.90472 12.2529 4.88937 15.2375 8.57112 15.2375C12.2529 15.2375 15.2375 12.2529 15.2375 8.57112Z" fill="#66676C"></path>
                        <path d="M13.6752 13.5542C14.0792 13.2174 14.6797 13.2718 15.0166 13.6757L19.779 19.3869C20.1159 19.7908 20.0615 20.3913 19.6575 20.7282C19.2536 21.065 18.653 21.0106 18.3162 20.6067L13.5537 14.8955C13.2169 14.4916 13.2713 13.8911 13.6752 13.5542Z" fill="#66676C"></path>
                    </svg>
                </button>
            </form>
        </div>
        <div class="user">
            <ul>
                <li>
                    <div class="d-flex align-center">
                        <img src="{{ asset((\Auth::user()->photo == "" || \Auth::user()->photo == null) ? "assets/img/user-empty.png" : "storage/avatars/".\Auth::user()->photo)}}" alt=""/>
                        <div>
                            <strong>{{\Auth::user()->FIO}}</strong>
                            <a href="{{ route("logout") }}" class="logout">{{ __("box.logout") }}</a>
                        </div>
                    </div>
                    <ul>
                        <li><a href="#">1</a> </li>
                        <li><a href="#">2</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
