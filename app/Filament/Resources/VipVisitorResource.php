<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\VipVisitor;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use pxlrbt\FilamentExcel\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VipVisitorResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\VipVisitorResource\RelationManagers;

class VipVisitorResource extends Resource
{
    protected static ?string $model = VipVisitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'الزوار';

    protected static ?string $navigationLabel = 'خريطة 35 ألف';

    protected static ?string $pluralLabel = 'خريطة 35 ألف';

    protected static ?string $modelLabel = 'خريطة 35 ألف';


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
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()->withColumns([
                            Column::make('name')->heading('الإسم'),
                            Column::make('email')->heading('البريد الإلكتروني'),
                            Column::make('phone')->heading('الجوال'),
                            Column::make('created_at')->heading('تاريخ الإضافة'),
                        ]),
                    ]),
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
            'index' => Pages\ListVipVisitors::route('/'),
            'create' => Pages\CreateVipVisitor::route('/create'),
            'edit' => Pages\EditVipVisitor::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasAnyRole(['superAdmin', 'admin', 'employee']);
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasAnyRole(['superAdmin', 'admin']);
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()->hasAnyRole(['superAdmin', 'admin']);
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->hasAnyRole(['superAdmin', 'admin']);
    }
}
