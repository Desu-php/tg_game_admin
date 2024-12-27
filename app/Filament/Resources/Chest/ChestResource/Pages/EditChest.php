<?php

namespace App\Filament\Resources\Chest\ChestResource\Pages;

use App\Filament\Resources\Chest\ChestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChest extends EditRecord
{
    protected static string $resource = ChestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
