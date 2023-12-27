<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorResource\Pages;
use App\Filament\Resources\VisitorResource\RelationManagers;
use App\Models\Visitor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'الزائرين';

    protected static ?string $navigationLabel = 'الزائرين';

    protected static ?string $pluralLabel = 'زائرين';

    protected static ?string $modelLabel = 'زائر';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Card::make()
            ->schema([
                Forms\Components\Grid::make(2)
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

                    Forms\Components\FileUpload::make('image')
                        ->label('الصورة')
                        ->image()
                        ->imageEditor()
                        ->appendFiles()
                        ->openable()
                        ->downloadable()
                        ->acceptedFileTypes(['image/*'])
                        ->required(),
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

                Tables\Columns\ImageColumn::make('image')
                ->circular()
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
            'index' => Pages\ListVisitors::route('/'),
            'create' => Pages\CreateVisitor::route('/create'),
            'edit' => Pages\EditVisitor::route('/{record}/edit'),
        ];
    }
}
