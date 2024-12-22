<?php

namespace App\Filament\Resources\Item\RarityResource\Pages;

use App\Filament\Resources\Item\RarityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRarity extends EditRecord
{
    protected static string $resource = RarityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
