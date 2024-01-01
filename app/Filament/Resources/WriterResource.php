<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Writer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use pxlrbt\FilamentExcel\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\WriterResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\WriterResource\RelationManagers;
use App\Filament\Resources\WriterResource\RelationManagers\WorksRelationManager;

class WriterResource extends Resource
{
    protected static ?string $model = Writer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'أدباء عبر التاريخ';

    protected static ?string $navigationLabel = 'الأدباء';

    protected static ?string $pluralLabel = 'أدباء';

    protected static ?string $modelLabel = 'أديب';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('البيانات الشخصية')
                ->schema([
                    Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('الإسم')
                            ->placeholder('إسم الأديب')
                            ->required()
                            ->minLength(3)
                            ->maxLength(255)
                            ->rules('required|min:3|max:255'),

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
                ]),

                Forms\Components\Section::make('نبذة عن الأديب')
                ->schema([
                    Forms\Components\RichEditor::make('about')
                    ->label('نبذة')
                    ->placeholder('نبذة عن الأديب')
                    ->required()
                    ->minLength(10)
                    ->rules('required|string'),
                ]),

                Forms\Components\Section::make('اقتباسات للأديب')
                ->schema([
                    Forms\Components\RichEditor::make('quote')
                    ->label('اقتباس')
                    ->placeholder('اقتباسات للأديب')
                    ->minLength(10)
                    ->required()
                    ->rules('required'),
                ]),

                Forms\Components\Section::make('المرفقات')
                ->schema([
                    Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('الصورة')
                            ->reorderable()
                            ->appendFiles()
                            ->openable()
                            ->downloadable()
                            ->acceptedFileTypes(['image/*'])
                            ->required()
                            ->rules('required'),

                        Forms\Components\FileUpload::make('podcast')
                            ->label('البودكاست')
                            ->reorderable()
                            ->appendFiles()
                            ->openable()
                            ->downloadable()
                            ->acceptedFileTypes(['audio/*']),

                            Forms\Components\FileUpload::make('qr')
                            ->label('رمز الإستجابة السريع')
                            ->reorderable()
                            ->appendFiles()
                            ->openable()
                            ->downloadable()
                            ->acceptedFileTypes(['image/*']),
                    ]),
                ]),

                Forms\Components\Grid::make(1)
                ->schema([
                    Forms\Components\Select::make('work_id')
                        ->label('الأعمال')
                        ->relationship('works', 'title')
                        ->multiple()
                        ->createOptionForm([
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
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('الإسم')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->label('الصورة'),

                Tables\Columns\TextColumn::make('birthday')
                    ->label('يوم الميلاد')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('deathday')
                    ->label('يوم الوفاة')
                    ->searchable()
                    ->sortable(),

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
                            Column::make('name')->heading('المشرف'),
                            Column::make('birthday')->heading('يوم الميلاد'),
                            Column::make('deathday')->heading('يوم الوفاة'),
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
                \Filament\Infolists\Components\Section::make('معلومات شخصية')->columns(3)->schema([
                    \Filament\Infolists\Components\TextEntry::make('name')
                    ->label('الإسم'),

                \Filament\Infolists\Components\TextEntry::make('birthday')
                    ->label('يوم الميلاد'),

                \Filament\Infolists\Components\TextEntry::make('deathday')
                    ->label('يوم الوفاة')
                    ->dateTime('M j, Y'),
                ]),

                \Filament\Infolists\Components\Section::make('الصورة الشخصية')->columns(1)->schema([
                    \Filament\Infolists\Components\ImageEntry::make('image')
                    ->label('صورة الأديب')
                    ->size(250)
                    ->circular(),
                ]),

                \Filament\Infolists\Components\Section::make('البودكاست')->columns(1)->schema([
                    \Filament\Infolists\Components\TextEntry::make('podcast')
                    ->label('البودكاست'),
                ]),

                \Filament\Infolists\Components\Section::make('رمز الإستجابة السريع')->columns(1)->schema([
                    \Filament\Infolists\Components\ImageEntry::make('qr')
                    ->label('رمز الإستجابة السريع'),
                ]),

                \Filament\Infolists\Components\Section::make('الإضافة')->columns(2)->schema([
                    \Filament\Infolists\Components\TextEntry::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('M j, Y'),

                    \Filament\Infolists\Components\TextEntry::make('updated_at')
                        ->label('تاريخ آخر تحديث')
                        ->dateTime('M j, Y'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            WorksRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWriters::route('/'),
            'create' => Pages\CreateWriter::route('/create'),
            'view'   => Pages\ViewWriter::route('/{record}'),
            'edit' => Pages\EditWriter::route('/{record}/edit'),
        ];
    }
}
