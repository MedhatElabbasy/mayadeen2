<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PoemsResource\Pages;
use App\Filament\Resources\PoemsResource\RelationManagers;
use App\Models\Poem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                                'nabati' => 'نبطية',
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
                ->label('نبطية او فصحى')
                ->options([
                    'nabati' => 'نبطية',
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
}
