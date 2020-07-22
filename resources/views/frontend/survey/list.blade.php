@extends("frontend.layout")
@section("title", " —")
@section("content")
    @include("errors")
<div class="profile-content content">
    <div class="profile-photo">
        <div class="img">
            <img src="{{ asset("storage/avatars/".$user->photo) }}" alt=""/>
            <a href="#">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.75 5.25C14.2415 5.75853 13.9872 6.01279 13.6814 6.0692C13.5615 6.09132 13.4385 6.09132 13.3186 6.0692C13.0128 6.01279 12.7585 5.75853 12.25 5.25L10.75 3.75C10.2415 3.24147 9.98721 2.98721 9.93081 2.68139C9.90869 2.56147 9.90869 2.43853 9.93081 2.31862C9.98721 2.01279 10.2415 1.75853 10.75 1.25V1.25C11.2585 0.741474 11.5128 0.487211 11.8186 0.430803C11.9385 0.408686 12.0615 0.408686 12.1814 0.430803C12.4872 0.487211 12.7415 0.741474 13.25 1.25L14.75 2.75C15.2585 3.25853 15.5128 3.51279 15.5692 3.81862C15.5913 3.93853 15.5913 4.06147 15.5692 4.18139C15.5128 4.48721 15.2585 4.74147 14.75 5.25V5.25ZM2 16C1.05719 16 0.585786 16 0.292893 15.7071C0 15.4142 0 14.9428 0 14V12.8284C0 12.4197 0 12.2153 0.0761205 12.0315C0.152241 11.8478 0.296756 11.7032 0.585787 11.4142L7.08579 4.91421C7.75245 4.24755 8.08579 3.91421 8.5 3.91421C8.91421 3.91421 9.24755 4.24755 9.91421 4.91421L11.0858 6.08579C11.7525 6.75245 12.0858 7.08579 12.0858 7.5C12.0858 7.91421 11.7525 8.24755 11.0858 8.91421L4.58579 15.4142C4.29676 15.7032 4.15224 15.8478 3.96847 15.9239C3.7847 16 3.58032 16 3.17157 16H2Z" fill="#000"/>
                </svg>
            </a>
        </div>
        <div class="info-profile">
            <a href="#">Пулатов Мавлонбек</a>
            <span class="category">Персональное данные</span>
        </div>

    </div>
    <div class="pa-15">
        <strong class="edit-title">История сигналов</strong>
        @foreach($surveyList as $value)

            <a href="{{ route("survey.detail",$value->id) }}" class="items-problems">
                <div class="top">
                    <strong>{{ $value->category->name }}</strong>
                    <span class="tags">ID A-{{ $value->id }}</span>
                </div>
                <div class="bottom">
                    <div class="rating">
                        @for($i = 1; $i <= $value->rank; $i++)
                        <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.0825 2.6574C12.4307 1.85452 13.5693 1.85452 13.9175 2.6574L16.2954 8.14107C16.4403 8.47522 16.7554 8.70417 17.118 8.73872L23.068 9.3057C23.9392 9.38871 24.2911 10.4716 23.6351 11.0508L19.1546 15.0069C18.8816 15.2479 18.7612 15.6184 18.8404 15.9739L20.1398 21.808C20.3301 22.6621 19.409 23.3314 18.6554 22.8865L13.5084 19.8478C13.1948 19.6627 12.8052 19.6627 12.4916 19.8478L7.34463 22.8865C6.59104 23.3314 5.6699 22.6621 5.86015 21.808L7.1596 15.9739C7.23878 15.6184 7.11842 15.2479 6.8454 15.0069L2.36494 11.0508C1.70894 10.4716 2.06079 9.38871 2.93196 9.3057L8.88204 8.73872C9.24462 8.70417 9.55974 8.47522 9.70464 8.14107L12.0825 2.6574Z" fill="#FFD365" stroke="#FFD365" stroke-width="3"/>
                        </svg>
                        @endfor
                    </div>
                    <span class="date">{{ date("d.m.Y",strtotime($value->created_at)) }}</span>
                </div>
            </a>
        @endforeach
    </div>
    <div class="send-problems blue-bg">
        <strong>Хотите сообщить о проблеме?</strong>
        <a href="{{ route("survey.category") }}" class="btn">Отправить сигнал</a>
    </div>
</div>
@endsection
@section("footer")
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
@endsection
