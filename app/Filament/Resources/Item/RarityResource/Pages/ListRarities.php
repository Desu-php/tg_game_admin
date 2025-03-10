<?php

namespace App\Filament\Resources\Item\RarityResource\Pages;

use App\Filament\Resources\Item\RarityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRarities extends ListRecords
{
    protected static string $resource = RarityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
