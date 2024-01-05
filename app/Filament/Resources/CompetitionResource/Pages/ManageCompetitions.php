<?php

namespace App\Filament\Resources\CompetitionResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use App\Models\CompetitionVote;
use Filament\Resources\Pages\ManageRecords ;
use App\Filament\Resources\CompetitionResource;

class ManageCompetitions extends ManageRecords
{
    protected static string $resource = CompetitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('reset')
            ->label('إعادة المسابقة')
            ->requiresConfirmation()
            ->action(function () {
                CompetitionVote::truncate();
            }),
            Actions\CreateAction::make(),
        ];
    }
}
