<?php

namespace App\Filament\Resources\CompetitionVoteResource\Pages;

use App\Filament\Resources\CompetitionVoteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCompetitionVote extends ViewRecord
{
    protected static string $resource = CompetitionVoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
