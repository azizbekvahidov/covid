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
            "Дата",
            "Категория",
            "Оценка категории",
            "Мед учреждение",
            "Мед учреждение жителя",
            "Пол",
            "Возраст",
            "Настроение",
            "ID",
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
                    $mood = __("Сердитое");
                    break;
                case 2:
                    $mood = __("Грустное");
                    break;
                case 3:
                    $mood = __("Тревожное");
                    break;
                case 4:
                    $mood = __("Спокойное");
                    break;
                case 5:
                    $mood = __("Радостное");
                    break;
            }
        }
        return [
            Date::dateTimeToExcel($survey->created_at),
            $survey->Category->ru_name,
            $survey->rank,
            ($survey->location_id == 0) ? "" : $survey->location->ru_title,
            ($survey->location_id == 0) ? $survey->clinic_desc : "",
            ( !empty($survey->user)) ? ($survey->user->gender == 1) ? "Мужчина" : "Женщина" : "",
            ( !empty($survey->user)) ? date("Y", time())-date("Y", strtotime($survey->user->birth)) : "",
            $mood,
            "A-".$survey->id,
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
