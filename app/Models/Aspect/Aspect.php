<?php

namespace App\Models\Aspect;

use App\Enums\AspectTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Aspect extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'type' => AspectTypeEnum::class,
        ];
    }
}
