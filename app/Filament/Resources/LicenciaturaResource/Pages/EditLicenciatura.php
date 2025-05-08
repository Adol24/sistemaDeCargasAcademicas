<?php

namespace App\Filament\Resources\LicenciaturaResource\Pages;

use App\Filament\Resources\LicenciaturaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLicenciatura extends EditRecord
{
    protected static string $resource = LicenciaturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
