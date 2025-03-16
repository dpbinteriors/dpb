<?php

namespace App\Filament\Resources\CommunicationMessageResource\Pages;

use App\Filament\Resources\CommunicationMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommunicationMessage extends EditRecord
{
    protected static string $resource = CommunicationMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
