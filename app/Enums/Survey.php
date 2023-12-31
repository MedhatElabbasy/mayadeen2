<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
 
enum Survey: string implements HasLabel, HasColor
{
    case VERY_SATISFIED = 'verySatisfied';
    case SATISFIED = 'satisfied';
    case NEUTRAL = 'neutral';
    case UPSET = 'upset';
    case VERY_UPSET = 'veryUpset';
    case HIGH = 'high';
    case MEDIUM = 'medium';
    case WEAK = 'weak';
    case SOCIALMEDIA = 'socialmedia';
    case BILLBOARDS = 'billboards';
    case WEABSITE = 'website';
    case FRIENDS = 'friends';

    
    public function getLabel(): ?string
    {
        return match ($this) {
            self::VERY_SATISFIED => 'ممتاز',
            self::SATISFIED => 'جيد',
            self::NEUTRAL => 'مقبول',
            self::UPSET => 'غير راضي',
            self::VERY_UPSET => 'مستاء جدا',
            self::HIGH => 'عالية',
            self::MEDIUM => 'متوسطة',
            self::WEAK => 'ضعيفه',
            self::SOCIALMEDIA => 'مواقع التواصل الاجتماعي',
            self::BILLBOARDS => 'اللوحات الإعلانية',
            self::WEABSITE => 'الموقع الإلكتروني',
            self::FRIENDS => 'الأصدقاء',
        };
    }

    public function getColor(): ?string {
        return match($this) {
            self::VERY_SATISFIED => 'success',
            self::SATISFIED => 'success',
            self::NEUTRAL => 'warning',
            self::UPSET => 'danger',
            self::VERY_UPSET => 'danger',
            self::HIGH => 'success',
            self::MEDIUM => 'warning',
            self::WEAK => 'danger',
            self::SOCIALMEDIA => 'success',
            self::BILLBOARDS => 'success',
            self::WEABSITE => 'success',
            self::FRIENDS => 'success',
        };
    }
}

