@extends("frontend.layout")
@section("content")
    <div class="problems-content content">
        <div class="problems-detail rules ">
            <div class="bordered">
                <a href="{{ url()->previous() }}" class="back">
                    <i>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM16 7L0.999999 7V9L16 9V7Z" fill="black"/>
                        </svg>
                    </i>
                    <div class="info">
                        <strong>{{ __("box.how_to_post_message") }}</strong>
                    </div>
                </a>
            </div>
            <div class="pa-15">
                @if(app()->getLocale() == "uz")
                    <p>
                        Portalning barcha funksiyalaridan foydalanish uchun aholi ro'yxatdan o'tib, mobil telefon raqamini ko`rsatishlari, SMS kod va shaxsiy ma'lumotlarini kiritishlari kerak.

                    </p>
                    <p>
                        Tibbiy xizmatlarga baho berish uchun foydalanuvchi toifani tanlashi va uni baholashi kerak. Foydalanuvchi o`z fikrini qoldirib, unga fotosurat, video va audio yozuvni ilova qilishi mumkin, shuningdek, uning hozirgi kayfiyatini aks ettiruvchi smaylikni tanlashi mumkin. Keyin foydalanuvchi davolanayotgan yoki karantinda bo`lgan tibbiy muassasani ko'rsatishi kerak.
                    </p>
                @elseif(app()->getLocale() == "ru")
                    <p>
                        Для того, чтобы иметь доступ ко всем функциям сервиса, жителям необходимо пройти регистрацию - указать номер мобильного телефона, ввести СМС-код и личные данные.
                    <p>
                        Для оценивания медицинских услуг пользователь должен выбрать категорию и оценить её. При желании пользователь может оставить отзыв и приложить фото, видео и аудио запись, а также выбрать смайлик, отображающий его текущее настроение. Затем пользователь должен указать медицинское учреждение, в котором он лечится или находится на карантине.                    </p>
                    </p>
                @elseif(app()->getLocale() == "cyrillic_uz")
                    <p>
                        Тиббий хизматларга баҳо бериш учун фойдаланувчи тоифани танлаши ва уни баҳолаши керак. Фойдаланувчи ўз фикрини қолдириб, унга фотосурат, видео ва аудио ёзувни илова қилиши мумкин, шунингдек, унинг ҳозирги кайфиятини акс эттирувчи смайликни танлаши мумкин. Кейин фойдаланувчи даволанаётган ёки карантинда бўлган тиббий муассасани кўрсатиши керак.
                    </p>
                    <p>
                        Порталнинг барча фунцияларидан фойдаланиш учун аҳоли рўйхатдан ўтиб, мобил телефон рақамини кўрсатишлари, СМС код ва шахсий маълумотларини киритишлари керак.
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
@section("css")
    <style>
        p {
            text-align: justify;
            padding: 8px 0;
        }
    </style>
@endsection
