<?php

namespace App\Filament\Resources\PoemsResource\Pages;

use App\Filament\Resources\PoemsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePoems extends CreateRecord
{
    protected static string $resource = PoemsResource::class;
}
