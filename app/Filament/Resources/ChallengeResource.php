<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChallengeResource\Pages;
use App\Filament\Resources\ChallengeResource\RelationManagers;
use App\Models\Challenge;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChallengeResource extends Resource
{
    protected static ?string $model = Challenge::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'تحدي نفسك';

    protected static ?string $navigationLabel = 'التحديات';

    protected static ?string $pluralLabel = 'تحديات';

    protected static ?string $modelLabel = 'تحدي';

    public static function form(Form $form): Form
    {
        return $form
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

                    ]),

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
