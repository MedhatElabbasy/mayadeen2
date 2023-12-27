<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoryResource\Pages;
use App\Models\Story;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StoryResource extends Resource
{
    protected static ?string $model = Story::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?string $navigationGroup = 'الأقصوصة';

    protected static ?string $navigationLabel = 'الأقصوصات';

    protected static ?string $pluralLabel = 'اقصوصات';

    protected static ?string $modelLabel = 'أقصوصة';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make(1)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('الإسم')
                                    ->placeholder('إسم الأقصوصة')
                                    ->required()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->rules('required'),

                                Forms\Components\RichEditor::make('content')
                                    ->label('المحتوي')
                                    ->placeholder('محتوي الأقصوصة')
                                    //->toolbarButtons(['bold', 'italic', 'link', 'clean'])
                                    ->required()
                                    // ->minLength(10)
                                    ->rules('required|string'),


                                    Forms\Components\TextInput::make('w1_name')
                                    ->label('الكاتب الأول')
                                    ->placeholder('اسم الكاتب الأول')
                                    ->required()
                                    // ->minLength(2)
                                    // ->maxLength(255)
                                    ->rules('required'),

                                Forms\Components\TextInput::make('w1_number')
                                    ->label('رقم الكاتب الأول')
                                    ->placeholder('رقم الكاتب الأول')
                                    ->nullable()
                                    // ->minLength(9)
                                    // ->maxLength(20)
                                    ->rules('nullable'),

                                Forms\Components\TextInput::make('w1_email')
                                    ->label('البريد الإلكتروني للكاتب الأول')
                                    ->placeholder('بريد الكاتب الأول')
                                    ->nullable()
                                    ->email()
                                    ->rules('nullable|email'),


                                    ///

                                    Forms\Components\TextInput::make('w2_name')
                                    ->label('الكاتب الثاني')
                                    ->placeholder('اسم الكاتب الثاني')
                                    ->required()
                                    // ->minLength(2)
                                    // ->maxLength(255)
                                    ->rules('required|min:2'),

                                Forms\Components\TextInput::make('w2_number')
                                    ->label('رقم الكاتب الثاني')
                                    ->placeholder('رقم الكاتب الثاني')
                                    ->nullable()
                                    // ->minLength(9)
                                    // ->maxLength(20)
                                    ->rules('nullable'),

                                Forms\Components\TextInput::make('w2_email')
                                    ->label('البريد الإلكتروني للكاتب الثاني')
                                    ->placeholder('بريد الكاتب الثاني')
                                    ->nullable()
                                    ->email()
                                    ->rules('nullable|email'),

                                    //////

                                    Forms\Components\TextInput::make('w3_name')
                                    ->label('الكاتب الثالث')
                                    ->placeholder('اسم الكاتب الثالث')
                                    ->required()
                                    // ->minLength(2)
                                    // ->maxLength(255)
                                    ->rules('required'),

                                Forms\Components\TextInput::make('w3_number')
                                    ->label('رقم الكاتب الثالث')
                                    ->placeholder('رقم الكاتب الثالث')
                                    ->nullable()
                                    // ->minLength(9)
                                    // ->maxLength(20)
                                    ->rules('nullable'),

                                Forms\Components\TextInput::make('w3_email')
                                    ->label('البريد الإلكتروني للكاتب الثالث')
                                    ->placeholder('بريد الكاتب الثالث')
                                    ->nullable()
                                    ->email()
                                    ->rules('nullable|email'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('الإسم')
                    ->searchable(),

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
                \Filament\Infolists\Components\Section::make('إسم الأقصوصة')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('title')
                            ->label('الإسم')
                            ->hiddenLabel(),
                    ]),

                \Filament\Infolists\Components\Section::make('محتوي الأقصوصة')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('content')
                            ->label('المحتوي')
                            ->hiddenLabel()
                            ->html(),
                    ]),

                \Filament\Infolists\Components\Section::make(' الكاتب الأول')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('w1_name')
                        ->label(' الأسم')
                            ->html(),
                            \Filament\Infolists\Components\TextEntry::make('w1_number')
                            ->label('  الهاتف')
                            ->html(),
                        \Filament\Infolists\Components\TextEntry::make('w1_email')
                            ->label('البريد الإلكتروني  ')
                            ->html(),
                    ]),

                \Filament\Infolists\Components\Section::make('الكاتب الثاني')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('w2_name')
                            ->label(' الاسم')
                            ->html(),
                        \Filament\Infolists\Components\TextEntry::make('w2_number')
                            ->label('الهاتف  ')
                            ->html(),
                        \Filament\Infolists\Components\TextEntry::make('w2_email')
                            ->label('البريد الإلكتروني  ')
                            ->html(),
                    ]),

                \Filament\Infolists\Components\Section::make('الكاتب الثالث')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('w3_name')
                            ->label(' الاسم')
                            ->html(),
                        \Filament\Infolists\Components\TextEntry::make('w3_number')
                            ->label('الهاتف  ')

                            ->html(),
                        \Filament\Infolists\Components\TextEntry::make('w3_email')
                            ->label('البريد الإلكتروني  ')
                            ->html(),

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
            'index' => Pages\ListStories::route('/'),
            'create' => Pages\CreateStory::route('/create'),
            'view' => Pages\ViewStory::route('/{record}'),
            'edit' => Pages\EditStory::route('/{record}/edit'),
        ];
    }
}