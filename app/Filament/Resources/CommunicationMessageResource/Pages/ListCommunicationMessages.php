<?php

namespace App\Filament\Resources\CommunicationMessageResource\Pages;

use App\Filament\Resources\CommunicationMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ListCommunicationMessages extends ListRecords
{
    protected static string $resource = CommunicationMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
        ];
    }
}
