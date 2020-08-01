<?php

namespace App\Exports;

use App\Survey;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Symfony\Component\Mime\Header\DateHeader;

class SurveyExport implements FromCollection, WithMapping, WithHeadings,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Survey::orderBy("id","desc")->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            "Сана",
            "Тоифа",
            "Тоифа бахоси",
            "Тиббий муассаса",
            "Фойдаланувчи тиббий муассасаси",
            "Кенглик",
            "Узунлик",
            "Жинси",
            "Ёши",
            "Кайфияти",
            "ID",
            "Фойдаланувчи ID",
            "Описание",

        ];
        // TODO: Implement headings() method.
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($survey): array
    {
        $model = new \App\Mood();
        $mood = "";
        $res = $model->getMood($survey->user_id,$survey->created_at);
        if ($res) {
            switch ($res->rank) {
                case 1:
                    $mood = __("Ғазабли");
                    break;
                case 2:
                    $mood = __("Қайғули");
                    break;
                case 3:
                    $mood = __("Ваҳимали");
                    break;
                case 4:
                    $mood = __("Осойишта");
                    break;
                case 5:
                    $mood = __("Хурсанд");
                    break;
            }
        }
        return [
            date( "m\\\d\\\Y",strtotime($survey->created_at)),
            $survey->Category->cyrillic_uz_name,
            $survey->rank,
            ($survey->location_id == 0) ? "" : $survey->location->cyrillic_uz_title,
            ($survey->location_id == 0) ? $survey->clinic_desc : "",
            ($survey->location_id == 0) ? "" : $survey->location->coords_lat,
            ($survey->location_id == 0) ? "" : $survey->location->coords_lng,
            ( !empty($survey->user)) ? ($survey->user->gender == 1) ? "Эркак" : "Аёл" : "",
            ( !empty($survey->user)) ? date("Y", time())-date("Y", strtotime($survey->user->birth)) : "",
            $mood,
            "A-".$survey->id,
            ($survey->user) ? $survey->user->id : "",
            $survey->opinion
        ];
        // TODO: Implement map() method.
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DATETIME
        ];
        // TODO: Implement columnFormats() method.
    }
}
