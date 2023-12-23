<?php

namespace App\Filament\Widgets;

use App\Models\Story;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class StoryChart extends ChartWidget
{
    protected static ?string $heading = 'مؤشر الأقصوصات';

    protected static ?string $description = 'إحصائية عن مؤشر الأقصوصات المضافة في ذلك الشهر.';

    protected static string $color = 'primary';

    protected function getData(): array
    {
        $data = Trend::model(Story::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();
     
        return [
            'datasets' => [
                [
                    'label' => 'الأقصوصات',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
