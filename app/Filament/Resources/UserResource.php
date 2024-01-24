<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use pxlrbt\FilamentExcel\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'المستخدمين';

    protected static ?string $navigationLabel = 'المستخدمين';

    protected static ?string $pluralLabel = 'المستخدمين';

    protected static ?string $modelLabel = 'المستخدم';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('البيانات الشخصية')
                ->schema([
                    Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('الإسم')
                            ->placeholder('إسم المستخدم')
                            ->required()
                            ->minLength(3)
                            ->maxLength(255)
                            ->rules('required|min:3|max:255'),

                        Forms\Components\TextInput::make('email')
                            ->label('البريد الإلكتروني')
                            ->placeholder('البريد الإلكتروني للمستخدم')
                            ->required()
                            ->email()
                            ->rules('required|email'),

                        Forms\Components\TextInput::make('password')
                            ->label('كلمة المرور')
                            ->placeholder('كلمة المرور للمستخدم')
                            ->required()
                            ->minLength(8)
                            ->maxLength(255)
                            ->rules('required|min:8|max:255'),
                    ]),
                ]),

                Forms\Components\Section::make('الصلاحيات')
                ->schema([
                    Forms\Components\MultiSelect::make('roles')
                        ->label('الصلاحيات')
                        ->relationship('roles', 'name')
                        ->placeholder('إختر صلاحيات المستخدم')
                        ->options(
                            \Spatie\Permission\Models\Role::all()->pluck('name', 'id')->toArray()
                        )
                        ->required()
                        ->rules('required'),
                ]),
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

                Tables\Columns\TextColumn::make('roles.name')
                    ->label('الدور')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->searchable(),

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
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()->withColumns([
                            Column::make('name')->heading('الإسم'),
                            Column::make('email')->heading('البريد الإلكتروني'),
                            Column::make('phone')->heading('الجوال'),
                            Column::make('roles.name')->heading('الدور'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasAnyRole(['superAdmin', 'admin']);
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
