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
                        <strong>{{ __("box.about_project") }}</strong>
                    </div>
                </a>
            </div>
            <div class="pa-15">
                @if(app()->getLocale() == "uz")
                    <p>
                        Sogboling.uz - bu interfaol xizmat bo'lib, uning vazifasi - tibbiyot xodimlarining Toshkent shahridagi tibbiyot muassasalarida davolanayotgan koronavirus bilan kasallangan bemorlarga munosabati va taqdim etilayotgan tibbiy xizmatlarsifati to'g'risida aktual ma'lumotlarni to'plash.
                    </p>
                    <p>
                        Foydalanuvchilar quyidagi toifalarda ko'rsatiladigan xizmatlar sifatini baholashlari mumkin: oziqlanish, davolanish, yashash sharoitlari, dori-darmon ta`minoti, tibbiyot xodimlarining munosabati. Bundan tashqari, baholash jarayonida foydalanuvchilar fotosuratlar, video va audioyozuvlarni biriktirishlari mumkin.
                        Shuningdek, foydalanuvchilar noqonuniy harakatlar yokitibbiy muassasalarda bo'lganlarida duch kelgan boshqa muammolar haqidaxabar berishlari mumkin.
                    </p>
                    <p>
                        Muammoni hal qilish to'g'risida qaror qabul qilish uchun foydalanuvchilar tomonidan yuborilgan har bir signal batafsil ko'rib chiqiladi.
                    </p>
                @elseif(app()->getLocale() == "ru")
                    <p>
                        Sogboling.uz - это интерактивный сервис, задача которого собрать актуальную информацию о качестве оказываемых услуг и отношении медперсонала к пациентам с коронавирусом, находящимся на лечении в медицинских учреждениях г. Ташкента.
                    </p>
                    <p>
                        Пользователи сервиса могут оценивать качество предоставляемых услуг по следующим категориям: питание, лечение, условия пребывания, обеспечение медикаментами, отношение медицинского персонала. Вдобавок, функционал сервиса позволяет пользователям прилагать к оценкам фото, видео и аудиозапись.
                        Также, пользователи смогут сообщать о противоправных действиях или других проблемах, с которыми столкнулись во время нахождения в медицинских учреждениях.
                    </p>
                    <p>
                        Каждый сигнал, отправленный пользователями будет детально изучен для принятия решений об исправлении проблем.
                    </p>
                @elseif(app()->getLocale() == "cyrillic_uz")
                    <p>
                        Sogboling.uz - бу интерфаол хизмат бўлиб, унинг вазифаси - тиббиёт ходимларининг Тошкент шаҳридаги тиббиёт муассасаларида даволанаётган коронавирус билан касалланган беморларга муносабати ва тақдим етилаётган тиббий хизматлар сифати тўғрисида актуал маълумотларни тўплаш.
                    </p>
                    <p>
                        Фойдаланувчилар қуйидаги тоифаларда кўрсатиладиган хизматлар сифатини баҳолашлари мумкин: озиқланиш, даволаниш, яшашшароитлари, дори-дармон таъминоти, тиббиёт ходимларининг муносабати. Бундан ташқари, баҳолаш жараёнида фойдаланувчилар фотосуратлар, видео ва аудиоёзувларни бириктиришлари мумкин.
                        Шунингдек, фойдаланувчилар ноқонуний ҳаракатлар ёки  тиббий муассасаларда бўлганларида дуч келган бошқа муаммолар ҳақида хабар беришлари мумкин.
                    </p>
                    <p>
                        Муаммони ҳал қилиш тўғрисида қарор қабул қилиш учун фойдаланувчилар томонидан юборилган ҳар бир сигнал батафсил кўриб чиқилади.
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
