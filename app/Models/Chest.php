<?php

namespace App\Models;

use App\Models\Item\Rarity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chest extends Model
{
    protected $guarded = ['id'];

    public function rarity(): BelongsTo
    {
        return $this->belongsTo(Rarity::class);
    }

    public function maxRarity(): BelongsTo
    {
        return $this->belongsTo(Rarity::class, 'max_rarity_id', 'id');
    }
}
