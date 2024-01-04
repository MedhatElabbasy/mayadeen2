<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompetitionVoteResource\Pages;
use App\Filament\Resources\CompetitionVoteResource\RelationManagers;
use App\Models\CompetitionVote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompetitionVoteResource extends Resource
{
    protected static ?string $model = CompetitionVote::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationGroup = 'الفعاليات';

    protected static ?string $navigationLabel = 'تصويت المنافسة';

    protected static ?string $pluralLabel = 'تصويت المنافسة';

    protected static ?string $modelLabel = 'تصويت المنافسة';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->schema([
                    Forms\Components\Select::make('team')
                    ->label('الفريق')
                    ->options([
                        '1' => 'الفريق الأول',
                        '2' => 'الفريق الثاني',
                    ])
                    ->required()
                    ->rules('required', 'in:1,2'),

                    Forms\Components\Select::make('round')
                    ->label('الجولة')
                    ->options([
                        '1' => 'الجولة الأول',
                        '2' => 'الجولة الثاني',
                    ])
                    ->required()
                    ->rules('required', 'in:1,2'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('team')
                    ->label('الفريق')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('round')
                    ->label('الجولة')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompetitionVotes::route('/'),
            'create' => Pages\CreateCompetitionVote::route('/create'),
            'view' => Pages\ViewCompetitionVote::route('/{record}'),
            'edit' => Pages\EditCompetitionVote::route('/{record}/edit'),
        ];
    }
}
