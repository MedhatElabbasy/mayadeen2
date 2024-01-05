<?php

namespace App\Filament\Resources\CompetitionVoteResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use App\Models\CompetitionVote;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\CompetitionVoteResource;

class ListCompetitionVotes extends ListRecords
{
    protected static string $resource = CompetitionVoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('reset')
            ->label('إعادة المسابقة')
            ->requiresConfirmation()
            ->action(function () {
                CompetitionVote::truncate();
            }),
        ];
    }
}
