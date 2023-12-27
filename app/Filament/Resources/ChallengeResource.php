<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Challenge;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ChallengeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ChallengeResource\RelationManagers;

class ChallengeResource extends Resource
{
    protected static ?string $model = Challenge::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'تحدي نفسك';

    protected static ?string $navigationLabel = 'التحديات';

    protected static ?string $pluralLabel = 'تحديات';

    protected static ?string $modelLabel = 'تحدي';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make("البيانات الشخصية")
                    ->schema([
                        Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('الإسم')
                                ->placeholder('إسم المتحدي')
                                ->required()
                                ->minLength(3)
                                ->maxLength(255)
                                ->rules('required|min:3|max:255'),

                            Forms\Components\TextInput::make('email')
                                ->label('البريد الإلكتروني')
                                ->placeholder('بريد إلكتروني المتحدي')
                                ->required()
                                ->email()
                                ->rules('required|email'),

                            Forms\Components\TextInput::make('phone')
                                ->label('جوال')
                                ->placeholder('جوال المتحدي')
                                ->required()
                                ->tel()
                                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                ->rules('required'),
                        ])
                    ]),

                    Forms\Components\Section::make("الدرجة")
                    ->schema([
                        Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('mark')
                                ->label('درجة')
                                ->placeholder('الدرجة التي حصل عليها المتحدي')
                                ->required()
                                ->numeric()
                                ->rules('required'),

                            Forms\Components\TextInput::make('fullMark')
                                ->label('الدرجة الكاملة')
                                ->placeholder('الدرجة الكاملة للأسئلة')
                                ->required()
                                ->numeric()
                                ->rules('required'),
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

                Tables\Columns\TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('الجوال')
                    ->searchable(),

                Tables\Columns\TextColumn::make('mark')
                    ->label('الدرجة')
                    ->searchable(),

                Tables\Columns\TextColumn::make('fullMark')
                    ->label('الدرجة الكاملة')
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
                \Filament\Infolists\Components\Section::make('الدرجة')
                ->schema([
                    \Filament\Infolists\Components\Grid::make(2)
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('name')
                        ->label('الإسم'),

                        \Filament\Infolists\Components\TextEntry::make('email')
                            ->label('البريد الإلكتروني'),
                    ]),
                ]),

                \Filament\Infolists\Components\Section::make('الدرجة')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(2)
                            ->schema([
                            \Filament\Infolists\Components\TextEntry::make('mark')
                                ->label('درجة')
                                ->badge(),

                            \Filament\Infolists\Components\TextEntry::make('fullMark')
                                ->label('الدرجة الكاملة')
                                ->badge(),
                        ]),
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
            'index' => Pages\ListChallenges::route('/'),
            'create' => Pages\CreateChallenge::route('/create'),
            'view' => Pages\ViewChallenge::route('/{record}'),
            'edit' => Pages\EditChallenge::route('/{record}/edit'),
        ];
    }
}
