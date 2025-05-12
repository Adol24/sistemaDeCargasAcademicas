<?php

namespace App\Filament\Resources\LicenciaturaResource\Pages;

use App\Filament\Resources\LicenciaturaResource;
use Faker\Core\Color;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateLicenciatura extends CreateRecord
{
    protected static string $resource = LicenciaturaResource::class;

    //Redireccionar a la vista de index
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    //Anular la notificación de creación predefinida
    protected function getCreatedNotification(): ?Notification
    {
        return null;
    }

    protected function afterCreate()
    {
        // Show a custom notification after creating the record
        Notification::make()
            ->title('Licenciatura creada')
            ->body('La licenciatura ha sido creada exitosamente.')
            ->success()
            ->send();

        // Optionally, you can also use the notify method
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
            ->label('Guardar')
           // ->icon('heroicon-o-check')
            ->color('success'),

           // $this->getCreateAnotherFormAction()
           // ->label('Guardar y crear otra'),

            $this->getCancelFormAction()
            ->label('Cancelar')
            ->color('danger')
           // ->url(LicenciaturaResource::getUrl('index'))
           
            
        ];
    }
}
