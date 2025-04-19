<?php

namespace App\Filament\Resources\TeamResource\Pages;


use App\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListTeam extends ListRecords
{
    use Translatable;

    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
