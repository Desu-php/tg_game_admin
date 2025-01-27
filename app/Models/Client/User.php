<?php

namespace App\Models\Client;

use App\Models\User\UserStat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    protected $guarded = ['id'];

    public function userChest(): HasOne
    {
        return $this->hasOne(UserChest::class);
    }

    public function userStat(): HasOne
    {
        return $this->hasOne(UserStat::class);
    }
}
