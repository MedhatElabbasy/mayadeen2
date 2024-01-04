<?php

namespace App\Filament\Resources\CompetitionVoteResource\Pages;

use App\Filament\Resources\CompetitionVoteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompetitionVote extends EditRecord
{
    protected static string $resource = CompetitionVoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
