<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DatesOfPoemResource\Pages;
use App\Filament\Resources\DatesOfPoemResource\RelationManagers;
use App\Models\DatesOfPoem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DatesOfPoemResource extends Resource
{
    protected static ?string $model = DatesOfPoem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'القصائد';

    protected static ?string $navigationLabel = 'مواعيد القصائد';

    protected static ?string $pluralLabel = 'المواعيد';

    protected static ?string $modelLabel = 'موعد';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make("إضافة موعد")
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('owner')
                            ->label('الإسم')
                            ->placeholder('إسم الشاعر')
                            ->minLength(3)
                            ->maxLength(255)
                            ->rules('max:255'),

                        Forms\Components\DatePicker::make('date')
                            ->label('التاريخ')
                            ->placeholder('تاريخ القصيدة')
                            ->required()
                            ->rules('required'),

                        Forms\Components\TimePicker::make('start_time')
                            ->label('وقت النهاية')
                            ->placeholder('وقت النهاية')
                            ->required()
                            ->rules('required'),

                        Forms\Components\TimePicker::make('end_time')
                            ->label('وقت النهاية')
                            ->placeholder('وقت النهاية')
                            ->required()
                            ->rules('required'),

                        Forms\Components\Textarea::make('details')
                            ->label('التفاصيل')
                            ->placeholder('التفاصيل')
                            ->required()
                            ->columnSpan('full'),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('owner')
                    ->label('الشاعر'),

                Tables\Columns\TextColumn::make('date')
                    ->sortable()
                    ->label('التاريخ'),

                Tables\Columns\TextColumn::make('start_time')
                    ->sortable()
                    ->label('وقت البداية'),

                Tables\Columns\TextColumn::make('end_time')
                    ->sortable()
                    ->label('وقت النهاية'),

                Tables\Columns\TextColumn::make('details')
                ->label('التفاصيل'),
            ])

            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListDatesOfPoems::route('/'),
            'create' => Pages\CreateDatesOfPoem::route('/create'),
            'edit' => Pages\EditDatesOfPoem::route('/{record}/edit'),
        ];
    }
}
