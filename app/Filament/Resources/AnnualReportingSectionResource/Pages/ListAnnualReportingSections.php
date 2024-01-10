<?php

namespace App\Filament\Resources\AnnualReportingSectionResource\Pages;

use App\Filament\Resources\AnnualReportingSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnnualReportingSections extends ListRecords
{
    protected static string $resource = AnnualReportingSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
