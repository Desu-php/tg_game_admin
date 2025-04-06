<?php

namespace App\Models\Aspect;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AspectStat extends Model
{
    protected $guarded = ['id'];

    public function aspect(): BelongsTo
    {
        return $this->belongsTo(Aspect::class);
    }
}
