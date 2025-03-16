<?php

namespace App\Filament\Resources\CommunicationFormResource\Pages;

use App\Filament\Resources\CommunicationFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCommunicationForms extends ManageRecords
{
    protected static string $resource = CommunicationFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
