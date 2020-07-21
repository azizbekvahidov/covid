@if($_SERVER['REQUEST_URI'] == "/")
    <footer>
    <a href="#" class="f-logo">Sogboling.uz</a>
    <strong>{{__("box.userful")}}</strong>
    <ul>
        <li><a href="#">{{__("box.how_to_post_message")}}</a> </li>
        <li><a href="#">{{__("box.user_agreements")}}</a> </li>
    </ul>
    <div class="copy">
        &copy; 2020 Хокимият города Ташкента. Все права защищены
    </div>
</footer>
@endif
