<?php

namespace App\Filament\Widgets;

use App\Models\Challenge;
use App\Models\Story;
use App\Models\Survey;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = -2;

    protected function getStats(): array
    {
        return [
            Stat::make('إجمالي التحديات', Challenge::count()),
            Stat::make('إجمالي الأقصوصات', Story::count()),
            Stat::make('إجمالي الإستبيانات', Survey::count()),
        ];
    }
}
