<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Work;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use pxlrbt\FilamentExcel\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\WorkResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WorkResource\RelationManagers;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\WorkResource\RelationManagers\WritersRelationManager;

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
                Forms\Components\Section::make("العمل")
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
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()->withColumns([
                            Column::make('title')->heading('الإسم'),
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
                \Filament\Infolists\Components\Section::make('العمل')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('title')
                        ->label('الإسم')
                        ->hiddenLabel(),
                    ]),

                \Filament\Infolists\Components\Section::make('الوصف')
                ->schema([
                    \Filament\Infolists\Components\TextEntry::make('description')
                    ->label('الوصف')
                    ->html()
                    ->hiddenLabel(),
                ]),

                \Filament\Infolists\Components\Section::make('الصورة')
                ->schema([
                    \Filament\Infolists\Components\ImageEntry::make('image')
                    ->label('الصورة')
                    ->size(250)
                    ->hiddenLabel(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            WritersRelationManager::class
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
