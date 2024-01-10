<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CompetitionVote;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompetitionVoteResource\Pages;
use App\Filament\Resources\CompetitionVoteResource\RelationManagers;

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
                        '1' => 'الفريق المعارض ( الأدب )',
                        '2' => 'الفريق المؤيد ( السينما )',
                    ])
                    ->required()
                    ->rules('required', 'in:1,2'),

                    Forms\Components\Select::make('round')
                    ->label('الجولة')
                    ->options([
                        '1' => 'الجولة الأولى',
                        '2' => 'الجولة الثاني',
                        '3' => 'الجولة الثالثة',
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
                Tables\Filters\SelectFilter::make('team')
                ->label('الفريق')
                ->options([
                    "1" => 'الفريق المعارض ( الأدب )',
                    "2" => 'الفريق المؤيد ( السينما )',
                ])
                ->attribute('team'),
                Tables\Filters\SelectFilter::make('round')
                ->label('الجولة')
                ->options([
                    "1" => 'الجولة الأولى',
                    "2" => 'الجولة الثانية',
                    "3" => 'الجولة الثالثة',
                ])
                ->attribute('round'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCompetitionVotes::route('/'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasAnyRole(['superAdmin', 'admin']);
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasAnyRole(['superAdmin', 'admin']);
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()->hasAnyRole(['superAdmin', 'admin']);
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->hasAnyRole(['superAdmin', 'admin']);
    }
}
