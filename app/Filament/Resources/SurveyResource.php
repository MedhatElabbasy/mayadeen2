<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Survey;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Enums\Survey as SurveyEnum;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SurveyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SurveyResource\RelationManagers;

class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationGroup = 'الإحصائيات';

    protected static ?string $navigationLabel = 'الإستبيانات';

    protected static ?string $pluralLabel = 'إستبيانات';

    protected static ?string $modelLabel = 'إستبيان';


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
                            ->placeholder('إسم المستفتي')
                            ->required()
                            ->minLength(3)
                            ->maxLength(255)
                            ->rules('required|min:3|max:255'),
    
                        Forms\Components\TextInput::make('email')
                            ->label('البريد الإلكتروني')
                            ->placeholder('بريد إلكتروني المستفتي')
                            ->required()
                            ->email()
                            ->rules('required|email'),
    
                        Forms\Components\TextInput::make('phone')
                            ->label('جوال')
                            ->placeholder('جوال المستفتي')
                            ->required()
                            ->tel()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                            ->rules('required'),
    
                    ]),
                ]),

                Forms\Components\Section::make("الإستبيان")
                ->schema([
                    Forms\Components\Grid::make(4)
                    ->schema([
                        Forms\Components\Select::make('facilities')
                            ->label('التسهيلات')
                            ->options(SurveyEnum::class)
                            ->required()
                            ->searchable(),

                            Forms\Components\Select::make('organization')
                            ->label('التنظيم')
                            ->options(SurveyEnum::class)
                            ->required()
                            ->searchable(),
                            
                            Forms\Components\Select::make('events')
                            ->label('الفعاليات')
                            ->options(SurveyEnum::class)
                            ->required()
                            ->searchable(),

                            Forms\Components\Select::make('access')
                            ->label('الوصول')
                            ->options(SurveyEnum::class)
                            ->required()
                            ->searchable(),
                    ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('الإسم'),
                Tables\Columns\TextColumn::make('email')
                    ->label('البريد الإلكتروني'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('جوال'),

                Tables\Columns\TextColumn::make('facilities')
                ->label('السهولة')
                ->badge(),

                Tables\Columns\TextColumn::make('organization')
                ->label('التنظيم')
                ->badge(),

                Tables\Columns\TextColumn::make('events')
                ->label('الفعاليات')
                ->badge(),

                Tables\Columns\TextColumn::make('access')
                ->label('الوصول')
                ->badge(),

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
                Tables\Filters\Filter::make('facilities')->label('بحث بالتسهيلات'),
                Tables\Filters\Filter::make('organization')->label('بحث بالتنظيم'),
                Tables\Filters\Filter::make('events')->label('بحث بالفعاليات'),
                Tables\Filters\Filter::make('access')->label('بحث بالوصول'),
            ], layout: FiltersLayout::AboveContent)
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
                \Filament\Infolists\Components\Section::make('البيانات الشخصية')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(3)
                        ->schema([
                            \Filament\Infolists\Components\TextEntry::make('name')
                                ->label('الإسم'),
        
                            \Filament\Infolists\Components\TextEntry::make('email')
                                ->label('البريد الإلكتروني'),
        
                            \Filament\Infolists\Components\TextEntry::make('phone')
                                ->label('جوال'),
                        ]),
                    ]),
    
                \Filament\Infolists\Components\Section::make('الإستبيان')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(4)
                        ->schema([
                            \Filament\Infolists\Components\TextEntry::make('facilities')
                            ->label('التسهيلات')
                            ->badge(),

                            \Filament\Infolists\Components\TextEntry::make('organization')
                                ->label('التنظيم')
                                ->badge(),

                            \Filament\Infolists\Components\TextEntry::make('events')
                                ->label('الفعاليات')
                                ->badge(),

                            \Filament\Infolists\Components\TextEntry::make('access')
                                ->label('الوصول')
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
            'index' => Pages\ListSurveys::route('/'),
            'create' => Pages\CreateSurvey::route('/create'),
            'view' => Pages\ViewSurvey::route('/{record}'),
            'edit' => Pages\EditSurvey::route('/{record}/edit'),
        ];
    }
}
