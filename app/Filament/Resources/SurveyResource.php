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
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Enums\FiltersLayout;
use pxlrbt\FilamentExcel\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\SurveyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\SurveyResource\RelationManagers;

class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationGroup = 'الإحصائيات';

    protected static ?string $navigationLabel = 'الإستبيانات';

    protected static ?string $pluralLabel = 'إستبيانات';

    protected static ?string $modelLabel = 'إستبيان';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

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
                Forms\Components\Section::make("الإستطلاع")
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('rating')
                            ->label('التقييم')
                            ->options([
                                '1' => 'راضي جدا',
                                '2' => 'راضي',
                                '3' => 'محايد',
                                '4' => 'مستاء',
                                '5' => 'مستاء جدا',
                            ])
                            ->searchable(),

                        Forms\Components\Textarea::make('opinion')
                            ->label('رأي المستطلع')
                            ->placeholder('رأي المستطلع')
                            ->required()
                            ->rules('required'),
                    ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                Tables\Columns\TextColumn::make('experience')
                    ->label('التجربة العامة')
                    ->badge(),

                Tables\Columns\TextColumn::make('guidelines')
                    ->label('كفاية الإرشادات')
                    ->badge(),

                Tables\Columns\TextColumn::make('literaryEvents')
                    ->label('تنوع الفعاليات الأدبية')
                    ->badge(),

                Tables\Columns\TextColumn::make('entertainmentEvents')
                ->label('تنوع الفعاليات الترفيهية')
                ->badge(),

                Tables\Columns\TextColumn::make('restaurant')
                ->label('تنوع المطاعم والمقاهي')
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
                            Column::make('experience')->heading('التجربة العامة'),
                            Column::make('guidelines')->heading('كفاية الإرشادات'),
                            Column::make('literaryEvents')->heading('تنوع الفعاليات الأدبية'),
                            Column::make('entertainmentEvents')->heading('تنوع الفعاليات الترفيهية'),
                            Column::make('restaurant')->heading('تنوع المطاعم والمقاهي'),
                            Column::make('referral')->heading('كيف سمعت عن المهرجان؟'),
                            Column::make('next')->heading('ما احتمالية حضورك للنسخ القادمة من المهرجان؟'),
                            Column::make('suggestion')->heading('ما احتمالية أن تنصح من حولك بحضور النسخ القادمة من المهرجان؟'),
                            Column::make('opinion')->heading('ما هي مقترحاتك لتطوير وتحسين النسخ القادمة من المهرجان؟'),
                            Column::make('created_at')->heading('تاريخ الإضافة'),
                        ]),
                    ]),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('الإستبيان')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(5)
                        ->schema([
                            \Filament\Infolists\Components\TextEntry::make('experience')
                            ->label('التجربة العامة')
                            ->badge(),

                            \Filament\Infolists\Components\TextEntry::make('guidelines')
                            ->label('كفاية الإرشادات')
                            ->badge(),

                            \Filament\Infolists\Components\TextEntry::make('literaryEvents')
                            ->label('تنوع الفعاليات الأدبية')
                            ->badge(),

                            \Filament\Infolists\Components\TextEntry::make('entertainmentEvents')
                            ->label('تنوع الفعاليات الترفيهية')
                            ->badge(),

                            \Filament\Infolists\Components\TextEntry::make('restaurant')
                            ->label('تنوع المطاعم والمقاهي')
                            ->badge(),
                        ]),
                ]),

                \Filament\Infolists\Components\Section::make('المهرجات')
                ->schema([
                    \Filament\Infolists\Components\Grid::make(3)
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('referral')
                        ->label('كيف سمعت عن المهرجان؟')
                        ->badge(),

                        \Filament\Infolists\Components\TextEntry::make('next')
                        ->label('ما احتمالية حضورك للنسخ القادمة من المهرجان؟')
                        ->badge(),

                        \Filament\Infolists\Components\TextEntry::make('suggestion')
                        ->label('ما احتمالية أن تنصح من حولك بحضور النسخ القادمة من المهرجان؟')
                        ->badge(),
                    ]),
                ]),

                \Filament\Infolists\Components\Section::make('رأيك')
                ->schema([
                    \Filament\Infolists\Components\Grid::make(3)
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('opinion')
                        ->label('ما هي مقترحاتك لتطوير وتحسين النسخ القادمة من المهرجان؟'),
                    ]),
                ]),

                \Filament\Infolists\Components\Section::make('التقييم')
                ->schema([
                    \Filament\Infolists\Components\Grid::make(5)
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('rating.ksayd_byn_altrk')->label('قصائد بين الطرق'),
                        \Filament\Infolists\Components\TextEntry::make('rating.msrh_alsharaa_almthrk')->label('مسرح الشارع المتحرك'),
                        \Filament\Infolists\Components\TextEntry::make('rating.mns_alfn')->label('منصة الفن'),
                        \Filament\Infolists\Components\TextEntry::make('rating.gathby_alfk')->label('جاذبية الفك'),
                        \Filament\Infolists\Components\TextEntry::make('rating.omyd_alabgdy')->label('وميض الأبجدية'),
                        \Filament\Infolists\Components\TextEntry::make('rating.hkayat_alflk')->label('حكايات الفلك'),
                        \Filament\Infolists\Components\TextEntry::make('rating.msrh_alaarod_altrathy')->label('مسرح العروض التراثية'),
                        \Filament\Infolists\Components\TextEntry::make('rating.aaoalm_akhr')->label('عوالم أخرى'),
                        \Filament\Infolists\Components\TextEntry::make('rating.shab_adb')->label('سحابة أدب'),
                        \Filament\Infolists\Components\TextEntry::make('rating.thd_nfsk')->label('تحدى نفسك'),
                        \Filament\Infolists\Components\TextEntry::make('rating.almtah')->label('المتاهة'),
                        \Filament\Infolists\Components\TextEntry::make('rating.almghamron_alsghar')->label('المغامرون الصغار'),
                        \Filament\Infolists\Components\TextEntry::make('rating.albrnamg_althkafy')->label('البرنامج الثقافي'),
                        \Filament\Infolists\Components\TextEntry::make('rating.dor_alnshr')->label('دور النشر'),
                        \Filament\Infolists\Components\TextEntry::make('rating.msrhy_alloh_alakbr')->label('مسرحية اللوح الأكبر'),
                        \Filament\Infolists\Components\TextEntry::make('rating.alamasy_alghnayy')->label('الأماسي الغنائية'),
                        \Filament\Infolists\Components\TextEntry::make('rating.alamasy_alshaary')->label('الأماسي الشعرية'),
                        \Filament\Infolists\Components\TextEntry::make('rating.msrh_alsharaa_althabt')->label('مسرح الشارع الثابت'),
                        \Filament\Infolists\Components\TextEntry::make('rating.byn_aladb')->label('بين الأدب'),
                        \Filament\Infolists\Components\TextEntry::make('rating.adbaaa_aabr_altarykh')->label('أدباء عبر التاريخ'),
                        \Filament\Infolists\Components\TextEntry::make('rating.alktb_almaalk')->label('الكتب المعلقة'),
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
