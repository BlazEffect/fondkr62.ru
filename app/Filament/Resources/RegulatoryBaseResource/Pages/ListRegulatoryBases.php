<?php

namespace App\Filament\Resources\RegulatoryBaseResource\Pages;

use App\Filament\Resources\RegulatoryBaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegulatoryBases extends ListRecords
{
    protected static string $resource = RegulatoryBaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
