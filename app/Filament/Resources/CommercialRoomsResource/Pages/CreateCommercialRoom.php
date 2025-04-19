<?php

namespace App\Filament\Resources\CommercialRoomsResource\Pages;


use App\Filament\Resources\CommercialRoomsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateCommercialRoom extends CreateRecord
{
    use Translatable;
    protected static string $resource = CommercialRoomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
