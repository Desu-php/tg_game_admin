<?php

namespace App\Filament\Resources\Client\ReferralUserResource\Pages;

use App\Filament\Resources\Client\ReferralUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReferralUsers extends ListRecords
{
    protected static string $resource = ReferralUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
