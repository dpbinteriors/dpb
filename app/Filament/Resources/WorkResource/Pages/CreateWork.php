<?php

namespace App\Filament\Resources\WorkResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\WorkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateWork extends CreateRecord
{
    use Translatable;
    protected static string $resource = WorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
