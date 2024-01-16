<?php

namespace App\Filament\Resources\SurveyResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use App\Exports\SurveysExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SurveyResource;

class ListSurveys extends ListRecords
{
    protected static string $resource = SurveyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('export')
            ->label('تصدير الكل')
            ->requiresConfirmation()
            ->action(function () {
               return Excel::download(new SurveysExport, 'surveys.xlsx');
            }),
        ];
    }
}
