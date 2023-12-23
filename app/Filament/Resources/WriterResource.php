<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WriterResource\Pages;
use App\Filament\Resources\WriterResource\RelationManagers;
use App\Models\Writer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                        ->label('المرفقات')
                        ->multiple()
                        ->reorderable()
                        ->appendFiles()
                        ->openable()
                        ->downloadable()
                        ->previewable(false)
                        ->maxFiles(10)
                        ->acceptedFileTypes(['audio/*', 'image/*', 'video/*', 'application/pdf', 'application/msword', 'text/plain'])
                ]),

                Forms\Components\Grid::make(1)
                ->schema([
                    Forms\Components\Select::make('work_id')
                        ->label('الأعمال')
                        ->required()
                        ->relationship('works', 'title')
                        ->multiple()
                        ->searchable()
                        ->selectablePlaceholder(false)
                        ->minItems(1)
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
                        ]),                
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
            'index' => Pages\ListWriters::route('/'),
            'create' => Pages\CreateWriter::route('/create'),
            'view'   => Pages\ViewWriter::route('/{record}'),
            'edit' => Pages\EditWriter::route('/{record}/edit'),
        ];
    }
}
