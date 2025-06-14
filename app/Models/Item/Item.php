<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $guarded = [];


    protected function casts(): array
    {
        return [
            'is_nft' => 'bool',
        ];
    }

    public function rarity(): BelongsTo
    {
        return $this->belongsTo(Rarity::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ItemType::class);
    }
}
