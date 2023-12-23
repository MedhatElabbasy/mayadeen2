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
    
    public function getLabel(): ?string
    {
        return match ($this) {
            self::VERY_SATISFIED => 'راضٍ جدًا',
            self::SATISFIED => 'راضي',
            self::NEUTRAL => 'حيادي',
            self::UPSET => 'منزعج',
            self::VERY_UPSET => 'مستاء جدا'
        };
    }

    public function getColor(): ?string {
        return match($this) {
            self::VERY_SATISFIED => 'success',
            self::SATISFIED => 'success',
            self::NEUTRAL => 'warning',
            self::UPSET => 'danger',
            self::VERY_UPSET => 'danger'
        };
    }
}

