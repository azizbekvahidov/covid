<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location_title');
            $table->string('coords_lat');
            $table->string('coords_lng');
            $table->string('number')->nullable();
            $table->string('location_email')->nullable();
            $table->string('addressline1')->nullable();
            $table->string('addressline2')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
        $position = 1;
        DB::connection('mysql')->table('locations')->insert([

            [
                'location_title' => 'Эпидимиология, миробиология ва юкумли касалликлар илмий текшириш институти клиникаси',
                'coords_lat' => '41.310318',
                'coords_lng' => "69.187578",
                'number' => "",
                'location_email' => "",
                'addressline1' => " Заковат, 2",
                'addressline2' => "Учтепа тумани",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Вирусология илмий текшириш институти',
                'coords_lat' => '41.360605',
                'coords_lng' => "69.300987",
                'number' => "",
                'location_email' => "",
                'addressline1' => "\"Янгишаҳар\" кўчаси, 7-а уй",
                'addressline2' => "Юнусобод тумани",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Республика 1-сон клиник касалхонаси',
                'coords_lat' => '41.301600',
                'coords_lng' => "69.284659",
                'number' => "",
                'location_email' => "",
                'addressline1' => "\"Содиқ Азимов\" кўчаси, 74 уй",
                'addressline2' => "Миробод тумани",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Травматология ва ортопедия илмий амалий тиббиёт маркази',
                'coords_lat' => '41.306502',
                'coords_lng' => "69.293572",
                'number' => "",
                'location_email' => "",
                'addressline1' => "78 Taraqqiyot ko'chasi, Тошкент 100047",
                'addressline2' => "",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Республика ногиронлар реабилитацияси маркази',
                'coords_lat' => '41.334731',
                'coords_lng' => "69.306560",
                'number' => "",
                'location_email' => "",
                'addressline1' => "",
                'addressline2' => "",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Нуронийлар санаторияси',
                'coords_lat' => '41.380289',
                'coords_lng' => "69.311061",
                'number' => "",
                'location_email' => "",
                'addressline1' => "19-квартал",
                'addressline2' => "Юнусобод тумани ",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Республика болалар ортопедия маркази',
                'coords_lat' => '41.362306',
                'coords_lng' => "69.342024",
                'number' => "",
                'location_email' => "",
                'addressline1' => " \"Олийгох\" кўчаси 8 уй (сельхоз институт худуди ичида №8 бино)",
                'addressline2' => "\"Солор\" шаҳарчаси",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Тошкент шахар 3-сон тугрук комплекси',
                'coords_lat' => '41.344223',
                'coords_lng' => "69.261070",
                'number' => "",
                'location_email' => "",
                'addressline1' => "ул. ТАХТАПУЛ ДАРВОЗА (бывш. С.РАХИМОВА), 351",
                'addressline2' => "Алмазарский",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Республика болалар суяк сили санаторияси',
                'coords_lat' => '41.353865',
                'coords_lng' => "69.377467",
                'number' => "",
                'location_email' => "",
                'addressline1' => "\"Буюк ипак йўли\"кўчаси, 425 уй",
                'addressline2' => "",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Тошкент шаҳар 2-сон юқумли касалликлар шифохонаси',
                'coords_lat' => '41.269767',
                'coords_lng' => "69.325119",
                'number' => "",
                'location_email' => "",
                'addressline1' => "  \"Жарқўрғон\" кўчаси, 39 уй",
                'addressline2' => "Яшнобод тумани",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Тошкент вилоят соматика шифохонаси',
                'coords_lat' => '41.288714',
                'coords_lng' => "69.218319",
                'number' => "",
                'location_email' => "",
                'addressline1' => "12 Бунёдкор кўчаси,",
                'addressline2' => "",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Республика тери таносил касалликлар шифохонаси',
                'coords_lat' => '41.295848',
                'coords_lng' => "69.289744",
                'number' => "",
                'location_email' => "",
                'addressline1' => " Нукус, 14",
                'addressline2' => "Миробод тумани",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Тошкент шаҳар 3-сон клиник шифохонаси',
                'coords_lat' => '41.272213',
                'coords_lng' => "69.307011",
                'number' => "",
                'location_email' => "",
                'addressline1' => "\"А. Фитрат\" кўчаси, 20 уй",
                'addressline2' => "Миробод тумани",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Тошкент шаҳар тез тиббий ёрдам шифохонаси',
                'coords_lat' => '41.268431',
                'coords_lng' => "69.217166",
                'number' => "",
                'location_email' => "",
                'addressline1' => "Фарҳод кўчаси, 2",
                'addressline2' => "",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Тошкент шаҳар 6-сон клиник шифохонаси',
                'coords_lat' => '41.232011',
                'coords_lng' => "69.330973",
                'number' => "",
                'location_email' => "",
                'addressline1' => "\"Боғишамол\" кўчаси, 112 уй",
                'addressline2' => "Юнусобод ",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'ТТА куп тармокли клиникаси',
                'coords_lat' => '41.350952',
                'coords_lng' => "69.171804",
                'number' => "",
                'location_email' => "",
                'addressline1' => "",
                'addressline2' => "Олмазор тумани",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Республика ихтисослаштирилган терапия ва тиббий реабилитация илмий амалий тиббиёт маркази',
                'coords_lat' => '41.337309',
                'coords_lng' => "69.279609",
                'number' => "",
                'location_email' => "",
                'addressline1' => "",
                'addressline2' => "Юнусабод тумани",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Тошкент шахар 1-сон клиник шифохонаси',
                'coords_lat' => '41.321520',
                'coords_lng' => "69.219756",
                'number' => "",
                'location_email' => "",
                'addressline1' => "",
                'addressline2' => "",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Республика 2-сон клиник касалхонаси',
                'coords_lat' => '41.403546',
                'coords_lng' => "69.449170",
                'number' => "",
                'location_email' => "",
                'addressline1' => "",
                'addressline2' => "Мирзо Улуғбек тумани",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Республика кўз касалликлари шифохонаси',
                'coords_lat' => '41.354512',
                'coords_lng' => "69.217555",
                'number' => "",
                'location_email' => "",
                'addressline1' => "Зиёд кўчаси 12 уй",
                'addressline2' => "Қорақамиш,",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Зангиота мажмуаси ЮКШ №1',
                'coords_lat' => '41,176099',
                'coords_lng' => "69,194044",
                'number' => "",
                'location_email' => "",
                'addressline1' => "",
                'addressline2' => "",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Зангиота мажмуаси ЮКШ №2',
                'coords_lat' => '41,170042',
                'coords_lng' => "69,193272",
                'number' => "",
                'location_email' => "",
                'addressline1' => "",
                'addressline2' => "",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Тошкент шаҳар Яккасарой ТТБ стақионар қисми билан ',
                'coords_lat' => '41.276720',
                'coords_lng' => "69.242501",
                'number' => "",
                'location_email' => "",
                'addressline1' => "",
                'addressline2' => "",
                'city' => "",
                'country' => "",
            ],
            [
                'location_title' => 'Карантинная зона Covid-19 «Уртасарай»',
                'coords_lat' => '41,120849',
                'coords_lng' => "69,52399",
                'number' => "",
                'location_email' => "",
                'addressline1' => "",
                'addressline2' => "",
                'city' => "",
                'country' => "",
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
