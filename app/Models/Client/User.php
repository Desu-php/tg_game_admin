<?php

namespace App\Models\Client;

use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function balance(): HasOne
    {
        return $this->hasOne(Balance::class);
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(ReferralUser::class, 'user_id', 'id');
    }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'user_tasks', 'user_id', 'task_id');
    }
}
