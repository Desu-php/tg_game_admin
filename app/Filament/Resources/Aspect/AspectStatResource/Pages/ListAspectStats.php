<?php

namespace App\Filament\Resources\Aspect\AspectStatResource\Pages;

use App\Filament\Resources\Aspect\AspectStatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAspectStats extends ListRecords
{
    protected static string $resource = AspectStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
