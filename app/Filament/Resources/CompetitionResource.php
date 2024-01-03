<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompetitionResource\Pages;
use App\Filament\Resources\CompetitionResource\RelationManagers\TeamsRelationManager;
use App\Models\Competition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class CompetitionResource extends Resource
{
    protected static ?string $model = Competition::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'المسابقة';

    protected static ?string $navigationLabel = 'المسابقات';

    protected static ?string $pluralLabel = 'مسابقات';

    protected static ?string $modelLabel = 'مسابقة';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultSort('created_at', 'asc')
            ->columns([

                Tables\Columns\TextColumn::make('label')
                    ->label('الخاصية')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('value')
                    ->label('القيمة')
                    ->formatStateUsing(fn ($state) => $state === null ? 'Empty' : $state)
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form(function (Competition $record) {
                        return match ($record->type) {
                            'bool' => [
                                Forms\Components\Toggle::make('value')
                                    ->label($record->label)
                            ],
                            'time' => [
                                Forms\Components\TimePicker::make('value')
                                    ->label($record->label)
                            ],
                            'date' => [
                                Forms\Components\DateTimePicker::make('value')
                                    ->label($record->label)
                            ],
                            default => [
                                Forms\Components\TextInput::make('value')
                                    ->label($record->label)
                            ]
                        };
                    }),
            ]);

    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompetitions::route('/'),
        ];
    }
}