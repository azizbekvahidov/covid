<?php

namespace App\Exports;

use App\Survey;
use App\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SurveyExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {

        return Survey::select("id", 'opinion', 'rank', Survey::);
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.

        return [
            "#",
            "Описание жалобы",
            "Оценка",
            "Медучреждение",
        ];
    }
}
