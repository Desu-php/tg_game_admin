<?php

namespace App\Enums;

enum AspectTypeEnum: string
{
    case Aspect = 'aspects';
    case Booster = 'booster';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
