<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Poem;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use pxlrbt\FilamentExcel\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\PoemsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\PoemsResource\RelationManagers;

class PoemsResource extends Resource
{
    protected static ?string $model = Poem::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    protected static ?string $navigationGroup = 'القصائد';

    protected static ?string $navigationLabel = 'القصائد';

    protected static ?string $pluralLabel = 'القصائد';

    protected static ?string $modelLabel = 'قصيدة';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make("إضافة قصيدة")
                ->schema([
                    Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('نوع القصيدة')
                            ->placeholder('نوع القصيدة')
                            ->options([
                                'nabati' => 'نبطي',
                                'fosha' => 'فصحى',
                            ])
                            ->required()
                            ->rules('required', 'in:fosha,nabati'),

                        Forms\Components\TextInput::make('name')
                            ->label('إسم القصيدة')
                            ->placeholder('إسم القصيدة')
                            ->minLength(3)
                            ->maxLength(255)
                            ->required()
                            ->rules('max:255'),

                        Forms\Components\Textarea::make('content')
                            ->label('القصيدة')
                            ->placeholder('القصيدة')
                            ->required()
                            ->rules('required')
                            ->columnSpan('full'),

                        Forms\Components\TextInput::make('author')
                            ->label('الشاعر')
                            ->placeholder('إسم الشاعر')
                            ->minLength(3)
                            ->maxLength(255)
                            ->required()
                            ->rules('max:255'),

                        Forms\Components\TextInput::make('phone')
                            ->label('رقم الهاتف')
                            ->placeholder('رقم الهاتف')
                            ->minLength(3)
                            ->maxLength(255)
                            ->required()
                            ->rules('max:255'),

                        Forms\Components\TextInput::make('email')
                            ->label('البريد الإلكتروني')
                            ->placeholder('البريد الإلكتروني')
                            ->minLength(3)
                            ->maxLength(255)
                            ->required()
                            ->rules('max:255'),
                    ]),
                ]),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('إسم القصيدة'),

                Tables\Columns\TextColumn::make('type')
                    ->label('نوع القصيدة'),

                Tables\Columns\TextColumn::make('author')
                    ->label('الشاعر'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('رقم الهاتف'),

                Tables\Columns\TextColumn::make('email')
                    ->label('البريد الإلكتروني'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                ->label('نبطي او فصحى')
                ->options([
                    'nabati' => 'نبطي',
                    'fosha' => 'فصحى',
                ])
                ->attribute('type')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()->withColumns([
                            Column::make('name')->heading('إسم القصيدة'),
                            Column::make('type')->heading('نوع القصيدة'),
                            Column::make('author')->heading('الإسم'),
                            Column::make('email')->heading('البريد الإلكتروني'),
                            Column::make('phone')->heading('الجوال'),
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
            'index' => Pages\ListPoems::route('/'),
            'create' => Pages\CreatePoems::route('/create'),
            'edit' => Pages\EditPoems::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasAnyRole(['superAdmin', 'admin', 'employee']);
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
