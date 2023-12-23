<?php

namespace App\Filament\Resources\WriterResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorksRelationManager extends RelationManager
{
    protected static string $relationship = 'works';

    protected static ?string $title = 'الأعمال';

    protected static ?string $pluralLabel = 'أعمال';

    protected static ?string $modelLabel = 'عمل';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('الإسم')
                        ->required()
                        ->placeholder('إسم العمل')
                        ->minLength(3)
                        ->maxLength(255)
                        ->rules('required|min:3|max:255'),
    
                    Forms\Components\RichEditor::make('description')
                        ->label('وصف')
                        ->required()
                        ->placeholder('وصف عن العمل')
                        ->minLength(10)
                        ->rules('required|string'),
                ]),

                Forms\Components\Grid::make(1)
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('الصورة')
                        ->required()
                        ->image()
                        ->imageEditor()
                        ->openable()
                        ->downloadable()
                        ->previewable()
                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('الإسم')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('الصورة'),
                
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
