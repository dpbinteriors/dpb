<?php

namespace App\Filament\Resources\CampaignsResource\Pages;

use App\Filament\Resources\CampaignsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateCampaign extends CreateRecord
{
    use Translatable;

    protected static string $resource = CampaignsResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
