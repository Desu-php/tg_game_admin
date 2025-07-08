<?php

namespace App\Enums;

enum TaskTypeEnum: string
{
    case Damage = 'damage';
    case Destroy = 'destroy';
    case ClickLink = 'click_link';
}
