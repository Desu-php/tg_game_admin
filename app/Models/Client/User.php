<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    protected $guarded = ['id'];

    public function userChest(): HasOne
    {
        return $this->hasOne(UserChest::class);
    }
}
