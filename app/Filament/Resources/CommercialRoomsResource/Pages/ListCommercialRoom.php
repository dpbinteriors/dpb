<?php

namespace App\Filament\Resources\CommercialRoomsResource\Pages;

use App\Filament\Resources\ArticleResource;
use App\Filament\Resources\CommercialRoomsResource;
use App\Filament\Resources\ResidentialRoomsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListCommercialRoom extends ListRecords
{
    use Translatable;

    protected static string $resource = CommercialRoomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
