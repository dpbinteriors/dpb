<?php

namespace App\Filament\Resources\ResidentialRoomsResource\Pages;


use App\Filament\Resources\ResidentialRoomsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditResidentailRoom extends EditRecord
{
    use Translatable;
    protected static string $resource = ResidentialRoomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
