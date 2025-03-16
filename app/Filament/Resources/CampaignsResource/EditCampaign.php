<?php

namespace App\Filament\Resources\CampaignsResource\Pages;

use App\Filament\Resources\CampaignsResource;
use Filament\Actions;

use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditCampaign extends EditRecord
{
    use Translatable;
    protected static string $resource = CampaignsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make()
        ];
    }
}
