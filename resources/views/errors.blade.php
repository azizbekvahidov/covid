@if($errors->any())
    <div class="alert warning">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9" cy="9" r="9" fill="#FFC611"/>
            <path d="M9 14C11.7614 14 14 11.7614 14 9C14 6.23858 11.7614 4 9 4C6.23858 4 4 6.23858 4 9C4 11.7614 6.23858 14 9 14Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 7V9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 11H9.005" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        @foreach($errors->all() as $error)
           <span> {{$error}} </span><br>
        @endforeach
        </svg>
    </div>
@endif
