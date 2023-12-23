<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkResource\Pages;
use App\Filament\Resources\WorkResource\RelationManagers;
use App\Models\Work;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkResource extends Resource
{
    protected static ?string $model = Work::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'أدباء عبر التاريخ';

    protected static ?string $navigationLabel = 'الأعمال';

    protected static ?string $pluralLabel = 'أعمال';

    protected static ?string $modelLabel = 'عمل';

    public static function form(Form $form): Form
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

    public static function table(Table $table): Table
    {
        return $table
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
            'index' => Pages\ListWorks::route('/'),
            'create' => Pages\CreateWork::route('/create'),
            'view' => Pages\ViewWork::route('/{record}'),
            'edit' => Pages\EditWork::route('/{record}/edit'),
        ];
    }
}
