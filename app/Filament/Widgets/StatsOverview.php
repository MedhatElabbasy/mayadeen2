<?php

namespace App\Filament\Widgets;

use App\Models\Poem;
use App\Models\Story;
use App\Models\Survey;
use App\Models\Visitor;
use App\Models\Challenge;
use App\Models\VipVisitor;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = -2;

    protected function getStats(): array
    {
        return [
            Stat::make('إجمالي التحديات', Challenge::count()),
            Stat::make('إجمالي الأقصوصات', Story::count()),
            Stat::make('إجمالي القصائد', Poem::count()),
            Stat::make('إجمالي الإستبيانات', Survey::count()),
            Stat::make('إجمالي خريطة مرسول', Visitor::count()),
            Stat::make('إجمالي خريطة 35 ألف', VipVisitor::count()),
        ];
    }
}
