<?php

namespace App\Filament\Resources\ProjectContentBlockResource\Pages;

use App\Filament\Resources\ProjectContentBlockResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectContentBlock extends EditRecord
{
    protected static string $resource = ProjectContentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
