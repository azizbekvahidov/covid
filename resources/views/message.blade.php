@if(session()->has("message"))
    <div class="message">
        {{session()->get("message")}}
    </div>
@endif
