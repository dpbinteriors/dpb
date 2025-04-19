<?php

namespace App\Filament\Resources\CommercialRoomsResource\Pages;


use App\Filament\Resources\CommercialRoomsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditCommercialRoom extends EditRecord
{
    use Translatable;
    protected static string $resource = CommercialRoomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
