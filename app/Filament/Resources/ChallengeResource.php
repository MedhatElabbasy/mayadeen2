<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Challenge;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use pxlrbt\FilamentExcel\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\ChallengeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\ChallengeResource\RelationManagers;

class ChallengeResource extends Resource
{
    protected static ?string $model = Challenge::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'تحدي نفسك';

    protected static ?string $navigationLabel = 'التحديات';

    protected static ?string $pluralLabel = 'تحديات';

    protected static ?string $modelLabel = 'تحدي';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\Section::make("الدرجة")
                    ->schema([
                        Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('mark')
                                ->label('درجة')
                                ->placeholder('الدرجة التي حصل عليها المتحدي')
                                ->required()
                                ->numeric()
                                ->rules('required'),

                            Forms\Components\TextInput::make('fullMark')
                                ->label('الدرجة الكاملة')
                                ->placeholder('الدرجة الكاملة للأسئلة')
                                ->required()
                                ->numeric()
                                ->rules('required'),
                        ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mark')
                    ->label('الدرجة')
                    ->searchable(),

                Tables\Columns\TextColumn::make('fullMark')
                    ->label('الدرجة الكاملة')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('M j, Y')
                    ->toggleable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('تاريخ آخر تحديث')
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
                            Column::make('mark')->heading('الدرجة'),
                            Column::make('fullMark')->heading('الدرجة الكاملة'),
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
                \Filament\Infolists\Components\Section::make('الدرجة')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(2)
                            ->schema([
                            \Filament\Infolists\Components\TextEntry::make('mark')
                                ->label('الدرجة')
                                ->badge(),

                            \Filament\Infolists\Components\TextEntry::make('fullMark')
                                ->label('الدرجة الكاملة')
                                ->badge(),
                        ]),
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
            'index' => Pages\ListChallenges::route('/'),
            'create' => Pages\CreateChallenge::route('/create'),
            'view' => Pages\ViewChallenge::route('/{record}'),
            'edit' => Pages\EditChallenge::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
