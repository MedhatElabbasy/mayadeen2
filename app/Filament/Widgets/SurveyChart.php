<?php

namespace App\Filament\Widgets;

use App\Models\Survey;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class SurveyChart extends ChartWidget
{
    protected static ?string $heading = 'مؤشر الإستبيانات';

    protected static ?string $description = 'إحصائية عن مؤشر الإستبيانات المضافة في ذلك الشهر.';

    protected static string $color = 'primary';

    protected function getData(): array
    {
        $data = Trend::model(Survey::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();
     
        return [
            'datasets' => [
                [
                    'label' => 'الإستبيانات',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'scatter';
    }
}
