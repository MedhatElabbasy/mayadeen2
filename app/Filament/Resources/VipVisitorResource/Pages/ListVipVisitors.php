<?php

namespace App\Filament\Resources\VipVisitorResource\Pages;

use App\Filament\Resources\VipVisitorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVipVisitors extends ListRecords
{
    protected static string $resource = VipVisitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
