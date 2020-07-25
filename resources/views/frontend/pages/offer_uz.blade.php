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
                        <strong>{{ __("box.public_offer") }}</strong>
                    </div>
                </a>
            </div>
            <div class="pa-15">
                <ul class="rules">
                    <li>Sogbling.uz axborot tizimidan foydalanish to'g'risida kelishuv</li>
                    <li>1. Termin va ta'riflar</li>
                    <li>1.1. Operator - o'z faoliyatini O'zbekiston Respublikasi qonunchiligiga, Toshkent shahrining normativ-huquqiy hujjatlariga muvofiq amalga oshiruvchi, Toshkent shahar hokimligi ma'muriyati huzuridagi signallarga javob berish shtabi.</li>
                    <li>1.2. Foydalanuvchi - sogboling.uz axborot tizimidan belgilangan tartibda foydalanishni istagan yoki foydalanish huquqiga ega bo'lgan jismoniy shaxs.</li>
                    <li>1.3. Parol - foydalanuvchi keyinchalik ushbu xizmatga kirishni ta'minlash uchun xizmatga ro'yhatdan o'tish paytida foydalanuchi tomonidan kiritilgan alifbo-raqamli belgilarning noyob ketma-ketligi.</li>
                    <li>1.4. Ro'yxatdan o'tish - bu xizmatga, axborot tizimiga, Toshkent shahrining axborot resursiga kirish uchun ma'lumotlarning dastlabki kiritilishi.</li>
                    <li>1.5. Xizmat - bu Toshkent shahri axborot tizimlari, axborot manbalari yoki ular o'rtasida o'zaro aloqani ta'minlovchi dasturiy ta'minot, (yoki) texnik vositalar.</li>

                    <li>2. Umumiy qoidalar</li>
                    <li>2.1. Ushbu Shartnoma foydalanuvchining Xizmatga kirishni tashkil etishda, shuningdek Foydalanuvchi Toshkent shahri xizmatlari va axborot tizimlarining funksional imkoniyatlaridan foydalanishda Operator va Foydalanuvchi huquqlari va majburiyatlarini belgilarydi. Shartnoma 2.3-bandda belgilangan tartibda Foydalanuvchi o'z shartlariga rozilik bildirgan paytdan boshlab kuchga kiradi.</li>
                    <li>2.2. Toshkent shahrining axborot tizimidan va (yoki) servis / individual funksiyalardan foydalanishni Toshkent shahri va (yoki) servisning axborot tizimidan foydalanishni boshlaganda yoki ro'yxatdan o'tish jarayoni tugagandan so'ng, foydalanuvchi Shartnoma shartlarini to'liq qabul qildi deb hisoblanadi.</li>
                    <li>2.3. Shartnoma Operator tomonidan maxsus ogohlantirishsiz o'zgartirilishi mumkin, shartnomaning yangi talqini ushbu bandda ko'rsatilgan manzil bo'yicha "Internet" axborot-telekommunikasiya tarmog'iga joylashtirilgan paytdan boshlab kuchga kiradi, agar shartnomaning yangi tahririda boshqacha qoida nazarda tutilmagan bo'lsa. Shartnomadagi har qanday o'zgartirishlar, qo'shimchalar, shuningdek yangi tahrirlar Shartnomaga qo'shilgan barcha foydalanuvchilarga, shu jumladan o'zgartirishlar, qo'shimchalar yoki yangi nashrlarni kiritish sanasidan oldinroq qo'shilganlarga ham qo'llaniladi. Аgar Foydalanuvchi axborot tizimining va (yoki) xizmatlarning funksional imkoniyatlaridan Shartnomaga o'zgartirishlar e'lon qilinganidan keyin foydalanishni davom ettirsa, foydalanuvchi tegishli o'zgartirishlarni qabul qilgan deb xisoblanadi. Shartnomaning joriy versiyasi https://sogboling.uz saytida joylashgan</li>
                    <li>2.4. Аgar Foydalanuvchi xizmatga qo'yiladigan talablarning har biriga rozi bo'lmasa, O'zbekiston Respublikasining qonun hujjatlari, Toshkent shahrining huquqiy hujjatlari, Operator hujjatlari, ushbu Shartnoma bilan belgilangan Toshkent shahrining axborot tizimi, foydalanuvchi ushbu axborot tizimidan foydalanishga haqli emas.</li>
                    <li>2.5. Saytdagi materiallardan Internetda yoki bosma nusxada foydalanganda manba ko'rsatilishi shart.</li>

                    <li>3. Toshkent shahrida foydalanuvchilarni ro'yxatdan o'tkazish, xizmatlardan, axborot tizimlari va resurslaridan foydalanish</li>
                    <li>3.1. Foydalanuvchini Xizmatda ro'yxatdan o'tkazish Foydalanuvchi Xizmatning veb-sahifasida ma'lum bir ma'lumot to'plamini taqdim etgandan va Xizmatning talablariga muvofiq Foydalanuvchi akkauntni yaratgandan so'ng amalga oshiriladi./li>
                    <li>3.2. Xizmatdan foydalanishning har qanday bosqichida Foydalanuvchi aniq va to'liq ma'lumotlarni taqdim etishga majburdir. Foydalanuvchi o'zi taqdim etgan ma'lumotlarni yangilab turish majburiyatini oladi. Аgar Foydalanuvchi noto'g'ri ma'lumot taqdim etsa yoki Operator Foydalanuvchi tomonidan taqdim etilgan ma'lumot to'liq emas yoki noto'g'ri ekanligiga ishonch hosil qilsa, Operator o'z xohishiga ko'ra foydalanuvchi akkauntini blokirovka qilishga yoki uni o'chirishga va (yoki) foydalanuvchidan Xizmatdan (yoki ularning individual funksiyalaridan) voz kechishga haqlidir.</li>
                    <li>3.3. Xizmatdan foydalanish, foydalanuvchining har qanday ma'lumotni, shu jumladan to'g'ri ishlashi va / yoki tizim xizmatlaridan (shu jumladan cookie-fayllardan) foydalanishi yoki foydalanuvchi tomonidan mustaqil ravishda taqdim etilgan statistik ma'lumotlarni to'plashi uchun zarur bo'lgan ma'lumotlarni qayta ishlashga roziligini anglatadi, shuningdek shaxsiy ma'lumotlar, shuningdek, davlat tomonidan taqdim etilgan ma'lumotlar to'g'risida ma'lumot olishga rozilik bildiradi shuningdek, unga davlat xizmatlari ko'rsatish to'g'risida, Toshkent shahri davlat hokimiyati va uning bo'ysunuvchi tashkilotlar, boshqa tashkilotlar faoliyati to'g'risida ma'lumot olishga rozilik berish. Ko'rsatilgan ma'lumotlar "Internet" axborot va telekommunikasiya tarmog'i orqali ma'lumot yuborish orqali ovozsiz aloqadan foydalangan holda (Xizmatning ichki vositalari orqali xabarlarni yuborish yoki qisqa matnli SMS xabarlarni mobil radiotelefon tarmog'i orqali yuborish, ussd-so'rov yuborish va hk) Foydalanuvchi tomonidan taqdim etilgan telefon raqamiga va (yoki) elektron pochta manziliga.</li>
                    <li>3.4. Foydalanuvchi o'zi foydalanadigan parolning xavfsizligi (taxmin qilishning qarshiligi) uchun javobgardir va shuningdek, parol va boshqa identifikasiya qilish vositalarining maxfiyligini ta'minlaydi. Foydalanuvchi Foydalanuvchi tomonidan xizmat ichida yoki undan foydalanishda sodir bo'lgan barcha harakatlar (shuningdek ularning oqibatlari) uchun, shu jumladan foydalanuvchi tomonidan foydalanuvchi akkauntiga kirish uchun ma'lumotni istalgan shartlar bilan uchinchi shaxslarga ixtiyoriy ravishda berish hollari uchun (shu jumladan shartnomalar yoki bitmlar bo'yicha). Shu bilan birga, Foydalanuvchi akkauntida amalga oshirilgan Xizmat ichidagi yoki undan foydalanuvchi tomonidan qilingan barcha harakatlar, foydalanuvchi tomonidan amalga oshirilgan deb hisoblanadi, Foydalanuvchi hisobidan foydalangan holda Xizmatga ruxsatsiz kirish to'g'risida va / yoki uning parolining maxfiyligi buzilganligi va boshqa identifikatsiya qilish usullari to'g'risida Operatorga xabar beradi.</li>
                    <li>3.5. Foydalanuvchi akkauntidan foydalangan holda xizmatga ruxsatsiz kirish (foydalanuvchi tomonidan tasdiqlanmagan) va / yoki uning parolining maxfiyligi yoki boshqa identifikasiya qilish vositalarining buzilishi (buzilish shubhasi) to'g'risida har qanday holatlar to'g'risida Operatorga darhol xabar qilishi shart. Xavfsizlik maqsadida, foydalanuvchi har bir ish sessiyasining oxirida Xizmatga qo'yiladigan talablarga muvofiq ravishda o'z akkaunti bo'yicha ishlarni xavfsiz ravishda o'chirib qo'yishi shart. Operator ma'lumotlarni yo'qolishi yoki shikastlanishi, shuningdek Foydalanuvchi tomonidan ushbu Shartnomaning qoidalarini buzishi natijasida yuzaga kelishi mumkin bo'lgan har qanday boshqa tabiatning oqibatlari uchun javobgar bo'lmaydi.</li>
                    <li>3.6. Operator ushbu Shartnomalarda belgilangan hollarda, barcha foydalanuvchilarning yoki ba'zi foydalanuvchilarning akkauntlari uchun Xizmatdan va uning qismlaridan foydalanishga cheklovlar o'rnatish huquqiga ega.</li>

                    <li>4. Tomonlarning huquq va majburiyatlari</li>
                    <li>4.1. Foydalanuvchi quyidagilarga majbur:</li>
                    <li>4.1.1. O'z kuchi va o'z hisobidan "Internet" axborot-tyelekommunikasiya tarmog'iga kirishni ta'minlashi, shuningdek ularning uskunalarini ruxsatsiz ishlatilishini sozlashi va himoya qilishi, va bunday foydalanish holatlari aniqlanganda tezkor choralarni ko'rishi.</li>
                    <li>4.1.2. Foydalanuvchi parolining va boshqa identifikasiya qilish vositalarining saqlanishini ta'minlashi kerak.</li>
                    <li>4.1.3. Foydalanuvchi ro'yxatdan o'tganidan keyin sodir bo'lgan barcha hisob-kitoblar orqali amalga oshirilgan barcha so'rovlar va harakatlar uchun to'liq javobgarlikni o'z zimmasiga oladi./li>
                    <li>4.1.4. Ushbu Shartnoma shartlariga rioya qilish.</li>
                    <li>4.2. Foydalanuvchi quyidagi huquqlarga ega:</li>
                    <li>4.2.1. Xizmatning funksional imkoniyatlaridan tegishli xizmatlar va axborot tizimlariga qo'yiladigan talablarga va ushbu Shartnomaga muvofiq foydalanish huquqiga ega.</li>
                    <li>4.2.2. Belgilangan tartibda Operatorga Xizmatning texnik ishlashiga oid savollarni yuborish.</li>
                    <li>4.3. Xizmatdan foydalanganda, foydalanuvchi quyidagi huquqlarga ega emas:</li>
                    <li>4.3.1. Noqonuniy, zararli, tuhmat, axloqni buzuvchi, zo'ravonlik va shafqatsizlikni namoyish qiluvchi (yoki tashviqot qiladigan), intellektual mulk huquqlarini buzadigan, odamlarga nisbatan nafratni va / yoki kamsitishni targ'ib qiluvchi tarkibiy qismlarni yuklash, yuborish, boshqa yo'llar bilan yuborish yoki tarqatish, irqiy, etnik, jinsiy, diniy, ijtimoiy xususiyatlar, har qanday shaxs yoki tashkilotga nisbatan haqoratlarni o'z ichiga olgan, pornografiya elementlarini (yoki targ'ibotni) o'z ichiga olgan, bolalar erotikligi, jinsiy xizmatlarni reklama qilish (yoki targ'ib qilish), giyohvandlik vositalarini yoki ularning o'xshashlarini, portlovchi moddalarni yoki boshqa qurollarni tayyorlash, ishlatish yoki boshqa foydalanish tartibini tushuntiradi.</li>
                    <li>4.3.2. Uchinchi shaxslarning, shu jumladan voyaga yetmaganlarning huquqlarini buzish va / yoki ularga har qanday shaklda zarar yetkazish.</li>
                    <li>4.3.3. Boshqa shaxsni yoki tashkilotning va / yoki jamoaning vakilini, shu jumladan Operator xodimlarini, huquqlarini o'zlashtirmaslik, shuningdek boshqalarning noqonuniy vakillik qilishning boshqa shakllari va usullaridan foydalanish, shuningdek foydalanuvchilar yoki Operatorning xususiyatlari nisbatan chalg'itish har qanday mavzu yoki obyekt.</li>
                    <li>4.3.4. O'zbekiston Respublikasi qonunlariga, Toshkent shahrining normativ-huquqiy hujjatlariga, Operator aktlariga yoki har qanday shartnoma munosabatlariga muvofiq bunday harakatlarga huquqlari bo'lmagan taqdirda, tarkibni yuklash, yuborish, yoki boshqa usul bilan tarqatish.</li>
                    <li>4.3.5. Maxsus ruxsat etilmagan reklama va spamlarni yuklash, yuborish yoki boshqa usul bilan tarqatish.</li>
                    <li>4.3.6. Zararli dasturlarni yoki boshqa kompyuter kodlarini, fayllarni yoki dasturlarni har qanday kompyuter yoki telekommunikasiya uskunalari yoki dasturlarining ishini buzish, cheklash, ruxsatsiz ishlash uchun mo'ljallangan materiallarni yuklash, yuborish, boshqa yo'l bilan yuborish va / yoki tarqatish. tijorat dasturiy mahsulotlariga va ularni yaratish uchun dasturlarga seriyali raqamlarni, loginlarni, parollarni va "Internet" axborot-telekommunikasiya tarmog'ida pulli manbalardan ruxsatsiz kirishni olish uchun boshqa vositalarni, shuningdek yuqorida ko'rsatilgan ma'lumotlarga havolalarni joylashtirish.</li>
                    <li>4.3.7. Boshqalarning shaxsiy ma'lumotlarini ruxsatsiz to'plash va saqlash.</li>
                    <li>4.3.8. Xizmatning normal ishlashini buzish;</li>
                    <li>4.3.9. Shartnoma tomonidan o'rnatilgan cheklovlar va taqiqlarni buzishga qaratilgan harakatlarga yordam berish.</li>
                    <li>4.3.10. Boshqa tarzda qonunni buzish.</li>
                    <li>4.4. Operator quyidagi majburiyatlarni bajaradi:</li>
                    <li>4.4.1. Operatorning vakolatiga taalluqli Xizmatning ishlashini ta'minlash, shuningdek O'zbekiston Respublikasining qonunlarida, Toshkent shahrining normativ-huquqiy hujjatlarida, Operator hujjatlari bilan belgilangan boshqa vakolatlarni amalga oshirish.</li>
                    <li>4.4.2. Foydalanuvchi bilan ushbu Shartnoma asosida Xizmatga kirish huquqini berish.</li>
                    <li>4.4.3. Belgilangan tartibda foydalanuvchi tomonidan taqdim etilgan ma'lumotlarning saqlanishini, xavfsizligini va oshkor qilinmasligini ta'minlash.</li>
                    <li>4.4.4. Ushbu Shartnomada nazarda tutilgan boshqa majburiyatlarni bajarish.</li>
                    <li>4.5. Operator quyidagi huquqlarga ega:</li>
                    <li>4.5.1. O'zbekiston Respublikasining qonunlarida, Toshkent shahrining normativ-huquqiy hujjatlarida, ushbu Shartnomada ko'zda tutilgan hollarda, Foydalanuvchini ro'yxatdan o'tish va xizmatning imkoniyatlaridan foydalanishni rad etish</li>
                    <li>4.5.2. Foydalanuvchi tomonidan quyidagi hollarda ogohlantirishsiz Xizmatdan foydalanishni to'xtatib qo'yish:
                        <ul>
                            <li>•	Foydalanuvchi tomonidan ushbu Shartnoma shartlari buzilishi yoki Foydalanuvchi tomonidan Operator ushbu Shartnoma shartlarini buzgan deb hisoblagan xatti-harakatlarni amalga oshirsa;</li>
                            <li>•	kutilmagan texnik yoki xavfsizlik muammolari tufayli;</li>
                            <li>•	foydalanuvchining Toshkent shahri xizmatlari, axborot tizimlari va resurslariga, shu jumladan har qanday qurilmalar, dasturiy ta'minotlardan foydalanishiga to'sqinlik qilishi va har qanday huquqbuzarliklar tufayli.</li>
                        </ul>
                    </li>
                    <li>4.5.3. Foydalanuvchiga Xizmatning ishlashi, shuningdek Operator va Toshkent shahridagi boshqa ijro organlari, tashkilotlar faoliyati to'g'risida tashkiliy va texnik ma'lumotlarni o'z ichiga olgan xabarlarni yuborish.</li>
                    <li>4.5.4. Toshkent shahri xizmatlari va axborot tizimlari ishini ta'minlashga, Toshkent shahrining axborot resurslarini belgilangan tartibda saqlashga uchinchi shaxslarni jalb qilish.</li>
                    <li>4.5.5. Ularning faoliyati vaqtincha to'xtatib qo'yilgan holda Toshkent shahar xizmatlari va axborot tizimlarida profilaktika ishlarini olib borish.</li>
                    <li>4.6. Operator quyidagi uchun javobgar emas:</li>
                    <li>4.6.1. Uchinchi shaxslar tomonidan yetkazib beriladigan, yetkazib beriladigan, ishlaydigan va / yoki xizmat ko'rsatadigan asbob-uskunalar, aloqa tizimlari yoki tarmoqlarining nosozliklari bilan bog'liq bo'lgan, xizmatga kirishda xizmatdagi avariyalar, uzilishlar yoki uzilishlar.</li>
                    <li>4.6.2. Foydalanuvchi tomonidan yetkazilgan zarar:
                        <ul>
                            <li>•	Foydalanuvchi tomonidan xizmatga kirish uchun foydalanadigan asbob-uskunalar va dasturlarda "viruslar" va boshqa zararli dasturlarning mavjudligi;</li>
                            <li>•	Foydalanuvchi ushbu Shartnomani buzsa;</li>
                            <li>•	uchinchi shaxslarning noqonuniy xatti-harakatlari, shu jumladan Foydalanuvchi akkauntidan foydalanish bilan bog'liq, shuningdek, xizmatdan foydalanish paytida u taqdim etgan foydalanuvchi to'g'risidagi ma'lumotlardan, agar bunday ma'lumotlar Operatorning aybisiz uchinchi shaxslarga yetkazilgan bo'lsa.</li>
                        </ul>
                    </li>
                    <li>4.7. Foydalanuvchi va Operator ushbu Shartnomani bajarmaganligi yoki lozim darajada bajarmaganligi uchun javobgar emas, agar yengib bo'lmas kuch ta'sirida yuzaga kelganligi sababli uni bajarish imkoni bo'lmasa.</li>
                    <li>5. Boshqa shartlar</li>
                    <li>5.1. Ushbu Bitim O'zbekiston Respublikasining qonunlariga muvofiq tartibga solinadi va sharhlanadi. Ushbu Bitim bilan tartibga solinmagan masalalar O'zbekiston Respublikasi qonunlariga muvofiq hal qilinishi kerak. Ushbu Shartnoma bilan tartibga solinadigan munosabatlardan kelib chiqadigan barcha mumkin bo'lgan tortishuvlar O'zbekiston Respublikasining amaldagi qonunchiligida belgilangan tartibda hal qilinadi.</li>
                    <li>5.2. Ushbu Shartnomaning shartlari, agar O'zbekiston Respublikasi qonunlarida va Toshkent shahrining normativ-huquqiy hujjatlarida boshqacha qoida nazarda tutilgan bo'lmasa, tomonlardan biri ushbu Bitimdan chiqish niyati to'g'risida bildirgan paytgacha amal qiladi.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
