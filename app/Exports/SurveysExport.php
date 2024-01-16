<?php

namespace App\Exports;

use App\Models\Survey;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SurveysExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Survey::all();
    }

    public function headings(): array
    {
        return [
            'التجربة العامة',
            'كفاية الإرشادات',
            'تنوع الفعاليات الأدبية',
            'تنوع الفعاليات الترفيهية',
            'تنوع المطاعم والمقاهي',
            'كيف سمعت عن المهرجان؟',
            'ما احتمالية حضورك للنسخ القادمة من المهرجان؟',
            'ما احتمالية أن تنصح من حولك بحضور النسخ القادمة من المهرجان؟',
            'ما هي مقترحاتك لتطوير وتحسين النسخ القادمة من المهرجان؟',
            'تاريخ الإضافة'
        ];
    }
    public function map($item): array
    {
        return [
            $item->experience->getLabel(),
            $item->guidelines->getLabel(),
            $item->literaryEvents->getLabel(),
            $item->entertainmentEvents->getLabel(),
            $item->restaurant->getLabel(),
            $item->referral->getLabel(),
            $item->next->getLabel(),
            $item->suggestion->getLabel(),
            $item->opinion,
            $item->created_at,
        ];
    }
}
