<?php

namespace App\Filament\Resources\ProjectContentBlockResource\Pages;

use App\Filament\Resources\ProjectContentBlockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectContentBlocks extends ListRecords
{
    protected static string $resource = ProjectContentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
