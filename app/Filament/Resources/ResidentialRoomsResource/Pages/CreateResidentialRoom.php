<?php

namespace App\Filament\Resources\ResidentialRoomsResource\Pages;


use App\Filament\Resources\ResidentialRoomsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateResidentialRoom extends CreateRecord
{
    use Translatable;
    protected static string $resource = ResidentialRoomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
