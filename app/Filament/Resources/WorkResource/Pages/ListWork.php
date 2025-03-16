<?php

namespace App\Filament\Resources\WorkResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\WorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListWork extends ListRecords
{
    use Translatable;

    protected static string $resource = WorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
