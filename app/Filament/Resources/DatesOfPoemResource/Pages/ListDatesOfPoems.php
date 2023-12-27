<?php

namespace App\Filament\Resources\DatesOfPoemResource\Pages;

use App\Filament\Resources\DatesOfPoemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDatesOfPoems extends ListRecords
{
    protected static string $resource = DatesOfPoemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
