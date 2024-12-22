<?php

namespace App\Models\Client;

use App\Models\Chest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserChest extends Model
{
    protected $guarded = ['id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chest(): BelongsTo
    {
        return $this->belongsTo(Chest::class);
    }
}
