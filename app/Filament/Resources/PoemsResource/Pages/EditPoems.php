<?php

namespace App\Filament\Resources\PoemsResource\Pages;

use App\Filament\Resources\PoemsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPoems extends EditRecord
{
    protected static string $resource = PoemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
