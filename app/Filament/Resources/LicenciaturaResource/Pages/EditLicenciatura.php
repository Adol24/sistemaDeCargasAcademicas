<?php

namespace App\Filament\Resources\LicenciaturaResource\Pages;

use App\Filament\Resources\LicenciaturaResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditLicenciatura extends EditRecord
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

        protected function afterSave()
    {
        // Show a custom notification after creating the record
        Notification::make()
            ->title('Licenciatura actuaizada')
            ->body('La licenciatura ha sido actualizada exitosamente.')
            ->success()
            ->send();

        // Optionally, you can also use the notify method
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->successNotification(
                Notification::make()
                    ->title('Licenciatura eliminada')
                    ->body('La licenciatura ha sido eliminada exitosamente.')
                    ->success()
            ),
        ];
    }


    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()
            ->label('Guardar Cambios')
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
