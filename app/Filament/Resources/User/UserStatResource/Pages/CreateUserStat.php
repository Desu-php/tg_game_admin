<?php

namespace App\Filament\Resources\User\UserStatResource\Pages;

use App\Filament\Resources\User\UserStatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserStat extends CreateRecord
{
    protected static string $resource = UserStatResource::class;
}
