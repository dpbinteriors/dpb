<?php

namespace App\Filament\Resources\TeamResource\Pages;


use App\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateTeam extends CreateRecord
{
    use Translatable;
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
