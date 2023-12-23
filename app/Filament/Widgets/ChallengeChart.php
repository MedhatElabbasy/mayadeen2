<?php

namespace App\Filament\Widgets;

use App\Models\Challenge;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ChallengeChart extends ChartWidget
{
    protected static ?string $heading = 'مؤشر التحديات';
    protected static ?string $description = 'إحصائية عن مؤشر التحديات في ذلك الشهر.';

    protected static string $color = 'primary';

    protected function getData(): array
    {
        $data = Trend::model(Challenge::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();
     
        return [
            'datasets' => [
                [
                    'label' => 'التحديات',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
