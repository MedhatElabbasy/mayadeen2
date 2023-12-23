<?php

namespace App\Enums;

enum Survey: string
{
    case VERY_SATISFIED = 'verySatisfied';
    case SATISFIED = 'satisfied';
    case NEUTRAL = 'neutral';
    case UPSET = 'upset';
    case VERY_UPSET = 'veryUpset';
}

