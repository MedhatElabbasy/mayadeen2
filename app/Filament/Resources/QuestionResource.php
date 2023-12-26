<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use App\Models\Question;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Tables\Columns\CountColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\QuestionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use App\Filament\Resources\QuestionResource\RelationManagers;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'تحدي نفسك';
    
    protected static ?string $navigationLabel = 'الأسئلة';

    protected static ?string $pluralLabel = 'أسئلة';

    protected static ?string $modelLabel = 'سؤال';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make('سؤال جديد')
                ->schema([
                    Forms\Components\TextInput::make('content')
                    ->label('السؤال')
                    ->hiddenLabel()
                    ->placeholder('أكتب السؤال')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->rules('required|min:3|max:255'),
                ]),

                Forms\Components\Card::make('الإختيارات')
                ->schema([
                    Forms\Components\Repeater::make('answers')
                    ->label('الإختيارات')
                    ->hiddenLabel()
                    ->schema([
                        Forms\Components\Card::make("اكتب إجابة للإختيارات")
                        ->schema([
                            Forms\Components\TextInput::make('content')
                            ->label('الإجابة')
                            ->required()
                            ->minLength(2)
                            ->maxLength(255)
                            ->columnSpanFull(),
                        ]),
        
                        Forms\Components\Card::make("الإجابة")
                        ->schema([
                            Forms\Components\Grid::make(1)
                            ->schema([
                                Forms\Components\Toggle::make('isCorrect')
                                ->label('هل الإجابة صحيحة؟')
                                ->required()
                                ->live(),

                                Forms\Components\TextInput::make('wrongText')
                                ->label('نص تلميح الاجابة الخاطئة')
                                ->required()
                                ->minLength(2)
                                ->maxLength(255)
                                ->required(fn (Get $get): bool => !$get('isCorrect'))
                                ->visible(fn (Get $get): bool => !$get('isCorrect')),
                                
                                Forms\Components\FileUpload::make('wrongImage')
                                ->label('صورة تلميح الاجابة الخاطئة')
                                ->image()
                                ->imageEditor()
                                ->reorderable()
                                ->appendFiles()
                                ->openable()
                                ->downloadable()
                                ->acceptedFileTypes(['image/*'])
                                ->required(fn (Get $get): bool => !$get('isCorrect'))
                                ->visible(fn (Get $get): bool => !$get('isCorrect')),
                            ])
                        ])
                    ])
                    ->minItems(2)
                    ->maxItems(4)
                    ->columns(1)
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content')
                    ->label('السؤال')
                    ->searchable(),

                CountColumn::make('answers')
                ->label('الإجابات'),
                    
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('السؤال')->schema([
                    \Filament\Infolists\Components\TextEntry::make('content')
                    ->label('السؤال'),
                ]),

                \Filament\Infolists\Components\Section::make('الإختيارات')->schema([
                    \Filament\Infolists\Components\RepeatableEntry::make('answers')
                    ->label('الإختيارات')
                    ->hiddenLabel()
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('content')
                        ->label('محتوي الإجابة'),

                        \Filament\Infolists\Components\IconEntry::make('isCorrect')
                        ->label('صحة الإجابة')
                        ->icon(fn (bool $state): string => match ($state) {
                            true => 'heroicon-o-check-circle',
                            false => 'heroicon-o-x-circle',
                        })
                        ->color(fn (bool $state): string => match ($state) {
                            true => 'success',
                            false => 'danger',
                        }),
                        
                        \Filament\Infolists\Components\TextEntry::make('wrongText')
                        ->label('نص تلميح الاجابة الخاطئة'),
                        
                        \Filament\Infolists\Components\ImageEntry::make('wrongImage')
                        ->label('صورة تلميح الاجابة الخاطئة')
                        ->size(500),
                    ])
                    ->columns(1)
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'view'   => Pages\ViewQuestion::route('/{record}'),
            'edit'   => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
