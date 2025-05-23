<?php

namespace App\Filament\Resources\Item\ItemTypeResource\Pages;

use App\Filament\Resources\Item\ItemTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemType extends EditRecord
{
    protected static string $resource = ItemTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
