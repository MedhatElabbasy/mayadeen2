<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Question;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\QuestionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Filament\Resources\QuestionResource\RelationManagers\AnswersRelationManager;

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
                    ->placeholder('أكتب السؤال')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->rules('required|min:3|max:255'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('content')
                    ->label('السؤال')
                    ->searchable(),

                Tables\Columns\TextColumn::make('answers_count')
                    ->label('الإجابات')
                    ->badge()
                    ->counts('answers'),

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
                \Filament\Infolists\Components\Section::make('معلومات شخصية')->columns(3)->schema([
                    \Filament\Infolists\Components\TextEntry::make('content')
                    ->label('السؤال'),
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
            AnswersRelationManager::class
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
