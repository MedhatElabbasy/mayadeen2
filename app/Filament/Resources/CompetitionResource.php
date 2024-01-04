<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Competition;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CompetitionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompetitionResource\RelationManagers;
use Filament\Forms\Components\TextInput;

class CompetitionResource extends Resource
{
    protected static ?string $model = Competition::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $navigationGroup = 'الفعاليات';

    protected static ?string $navigationLabel = 'المنافسة';

    protected static ?string $pluralLabel = 'منافسة';

    protected static ?string $modelLabel = 'منافسة';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
                    ->html()
                    ->formatStateUsing(fn ($state) => $state === null ? 'Empty' : $state)
                    ->sortable()
                    ->searchable(),
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
                                Forms\Components\DatePicker::make('value')
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
            'index' => Pages\ManageCompetitions::route('/'),
        ];
    }
}
