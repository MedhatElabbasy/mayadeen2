<?php

namespace App\Filament\Resources\WorkResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WritersRelationManager extends RelationManager
{
    protected static string $relationship = 'writers';

    protected static ?string $title = 'الأدباء';

    protected static ?string $pluralLabel = 'أدباء';

    protected static ?string $modelLabel = 'أديب';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('الإسم')
                        ->placeholder('إسم الأديب')
                        ->required()
                        ->minLength(3)
                        ->maxLength(255)
                        ->rules('required|min:3|max:255'),

                    Forms\Components\RichEditor::make('about')
                        ->label('نبذة')
                        ->placeholder('نبذة عن الأديب')
                        ->required()
                        ->minLength(10)
                        ->rules('required|string'),

                    Forms\Components\RichEditor::make('quote')
                        ->label('اقتباس')
                        ->placeholder('اقتباسات للأديب')
                        ->required()
                        ->minLength(10)
                        ->rules('required'),
                ]),

                Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\DatePicker::make('birthday')
                        ->label('يوم الميلاد')
                        ->placeholder('يوم ميلاد الأديب')
                        ->required()
                        ->rules('required'),

                    Forms\Components\DatePicker::make('deathday')
                        ->label('يوم الوفاة')
                        ->placeholder('يوم وفاة الأديب')
                        ->required()
                        ->rules('required'),
                ]),

                Forms\Components\Grid::make(1)
                ->schema([
                    Forms\Components\FileUpload::make('attachments')
                        ->label('البودكاست')
                        ->multiple()
                        ->reorderable()
                        ->appendFiles()
                        ->openable()
                        ->downloadable()
                        ->maxFiles(10)
                        ->acceptedFileTypes(['audio/*', 'image/*', 'video/*', 'application/pdf', 'application/msword', 'text/plain'])
                ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('الإسم')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
