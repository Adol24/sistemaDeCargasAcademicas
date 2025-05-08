<?php

namespace App\Filament\Resources\LicenciaturaResource\Pages;

use App\Filament\Resources\LicenciaturaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLicenciaturas extends ListRecords
{
    protected static string $resource = LicenciaturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
