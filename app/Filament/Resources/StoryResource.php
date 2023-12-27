<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Story;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StoryResource\RelationManagers;

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
                            ->rules('required|min:3|max:255'),

                        Forms\Components\RichEditor::make('content')
                            ->label('المحتوي')
                            ->placeholder('محتوي الأقصوصة')
                            //->toolbarButtons(['bold', 'italic', 'link', 'clean'])
                            ->required()
                            ->minLength(10)
                            ->rules('required|string'),
                    ]),

                    Forms\Components\Section::make("الإستطلاع")
                    ->schema([
                        Forms\Components\Grid::make(1)
                        ->schema([
                            Forms\Components\Textarea::make('opinion')
                                ->label('رأي المستطلع')
                                ->placeholder('رأي المستطلع')
                                ->required()
                                ->rules('required'),
                        ])
                    ]),
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
                  ])
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
            'index'  => Pages\ListStories::route('/'),
            'create' => Pages\CreateStory::route('/create'),
            'view'   => Pages\ViewStory::route('/{record}'),
            'edit'   => Pages\EditStory::route('/{record}/edit'),
        ];
    }
}
