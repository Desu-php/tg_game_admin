<?php

namespace App\Models\Task;

use App\Enums\TaskTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'type' => TaskTypeEnum::class,
        ];
    }
}
