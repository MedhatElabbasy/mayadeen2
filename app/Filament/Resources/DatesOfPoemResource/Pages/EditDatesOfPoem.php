<?php

namespace App\Filament\Resources\DatesOfPoemResource\Pages;

use App\Filament\Resources\DatesOfPoemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDatesOfPoem extends EditRecord
{
    protected static string $resource = DatesOfPoemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
