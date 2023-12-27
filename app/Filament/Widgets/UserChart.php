<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class UserChart extends ChartWidget
{
    protected static ?string $heading = 'مؤشر المستخدمين';

    protected static ?string $description = 'إحصائية عن مؤشر المستخدمين المضافة في ذلك الشهر.';

    protected static string $color = 'primary';

    protected function getData(): array
    {
        $data = Trend::model(User::class)
            ->between(
                start: now()->startOfMonth(),
                end  : now()->endOfMonth(),
            )
            ->perDay()
            ->count();
     
        return [
            'datasets' => [
                [
                    'label' => 'المستخدمين',
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
