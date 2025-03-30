<?php

namespace App\Enums;

enum AspectTypeEnum: string
{
    case Aspect = 'aspect';
    case Booster = 'booster';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
