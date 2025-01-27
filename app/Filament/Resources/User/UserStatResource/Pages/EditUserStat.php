<?php

namespace App\Filament\Resources\User\UserStatResource\Pages;

use App\Filament\Resources\User\UserStatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserStat extends EditRecord
{
    protected static string $resource = UserStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
