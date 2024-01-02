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
                Forms\Components\TextInput::make('name')
                    ->label('الإسم')
                    ->placeholder('إسم المسابقة')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->rules('required'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->label('اسم المسابقة')
                    ->alignCenter()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('M j, Y')
                    ->toggleable()
                    ->sortable(),
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
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()->withColumns([
                            Column::make('name')->heading('الاسم '),
                            Column::make('created_at')->heading('تاريخ الإضافة'),
                        ]),
                    ]),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('إسم المسابقة')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('name')
                        ->label('الإسم'),
                    ]),


                    \Filament\Infolists\Components\Section::make(' الفرق المشاركة ')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('teams.name')
                            ->label('الإسم'),
                    ]),



            ]);
    }

    public static function getRelations(): array
    {
        return [
            TeamsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompetitions::route('/'),
            'create' => Pages\CreateCompetition::route('/create'),
            'edit' => Pages\EditCompetition::route('/{record}/edit'),
        ];
    }
}