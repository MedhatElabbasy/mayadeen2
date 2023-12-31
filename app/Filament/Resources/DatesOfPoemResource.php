<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DatesOfPoem;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DatesOfPoemResource\Pages;
use App\Filament\Resources\DatesOfPoemResource\RelationManagers;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class DatesOfPoemResource extends Resource
{
    protected static ?string $model = DatesOfPoem::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'القصائد';

    protected static ?string $navigationLabel = 'جدول القصائد';

    protected static ?string $pluralLabel = 'جدول قصائد';

    protected static ?string $modelLabel = 'جدول قصائد';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make("قصيدة او استراحة")
                ->schema([
                    Forms\Components\Toggle::make('is_break')
                    ->label('هل هذا الموعد استراحة؟')
                    ->required()
                    ->live(),
                ]),

                Forms\Components\Section::make("إضافة موعد قصيدة")
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('owner')
                            ->label('الإسم')
                            ->placeholder('إسم الشاعر')
                            ->minLength(3)
                            ->maxLength(255)
                            ->rules('max:255')
                            ->columnSpan('full')
                            ->required(fn (Get $get): bool => !$get('is_break'))
                            ->visible(fn (Get $get): bool => !$get('is_break'))
                            ->default(function (Get $get): string {
                                return $get('is_break') ? '' : $get('owner') ?? '';
                            }),

                        Forms\Components\Textarea::make('details')
                            ->label('التفاصيل')
                            ->placeholder('التفاصيل')
                            ->required()
                            ->columnSpan('full')
                            ->required(fn (Get $get): bool => !$get('is_break'))
                            ->visible(fn (Get $get): bool => !$get('is_break'))
                            ->default(function (Get $get): string {
                                return $get('is_break') ? '' : $get('details') ?? '';
                            }),

                        Forms\Components\DatePicker::make('date')
                            ->label('التاريخ')
                            ->placeholder('تاريخ القصيدة')
                            ->required()
                            ->rules('required'),

                        Forms\Components\TimePicker::make('start_time')
                            ->label('وقت البداية')
                            ->placeholder('وقت البداية')
                            ->required()
                            ->rules('required'),

                        Forms\Components\TimePicker::make('end_time')
                            ->label('وقت النهاية')
                            ->placeholder('وقت النهاية')
                            ->required()
                            ->rules('required'),

                            Forms\Components\Select::make('type')
                            ->label('النوع')
                            ->placeholder('النوع')
                            ->options([
                                'nabati' => 'نبطي',
                                'fosha' => 'فصحى',
                            ])->required()
                            ->rules('required', 'in:fosha,nabati'),
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

                Tables\Columns\TextColumn::make('details')
                    ->label('التفاصيل'),

                Tables\Columns\IconColumn::make('is_break')
                    ->label('إستراحة')
                    ->boolean(),

                Tables\Columns\TextColumn::make('date')
                    ->sortable()
                    ->label('التاريخ'),

                Tables\Columns\TextColumn::make('start_time')
                    ->sortable()
                    ->label('وقت البداية'),

                Tables\Columns\TextColumn::make('end_time')
                    ->sortable()
                    ->label('وقت النهاية'),
            ])

            ->filters([
                Tables\Filters\SelectFilter::make('is_break')
                ->label('استراحة او قصيدة')
                ->options([
                    true => 'استراحة',
                    false => 'قصيدة',
                ])
                ->attribute('is_break'),

                Tables\Filters\SelectFilter::make('type')
                ->label('نبطي او فصحى')
                ->options([
                    'nabati' => 'نبطي',
                    'fosha' => 'فصحى',
                ])
                ->attribute('type')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()->withColumns([
                            Column::make('owner')->heading('الشاعر'),
                            Column::make('details')->heading('التفاصيل'),
                            Column::make('is_break')->heading('إستراحة'),
                            Column::make('date')->heading('التاريخ'),
                            Column::make('start_time')->heading('وقت البداية'),
                            Column::make('end_time')->heading('وقت النهاية'),
                            Column::make('created_at')->heading('تاريخ الإضافة'),
                        ]),
                    ]),
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
