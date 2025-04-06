<?php

namespace App\Filament\Resources\Aspect\AspectStatResource\Pages;

use App\Filament\Resources\Aspect\AspectStatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAspectStat extends EditRecord
{
    protected static string $resource = AspectStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
