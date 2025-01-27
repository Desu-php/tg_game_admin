<?php

namespace App\Filament\Resources\User\UserStatResource\Pages;

use App\Filament\Resources\User\UserStatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserStats extends ListRecords
{
    protected static string $resource = UserStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
