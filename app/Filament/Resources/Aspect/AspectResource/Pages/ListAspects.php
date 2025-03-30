<?php

namespace App\Filament\Resources\Aspect\AspectResource\Pages;

use App\Filament\Resources\Aspect\AspectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAspects extends ListRecords
{
    protected static string $resource = AspectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
