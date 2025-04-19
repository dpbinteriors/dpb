<?php

namespace App\Filament\Resources\ResidentialRoomsResource\Pages;

use App\Filament\Resources\ArticleResource;
use App\Filament\Resources\ResidentialRoomsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListResidentialRoom extends ListRecords
{
    use Translatable;

    protected static string $resource = ResidentialRoomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
