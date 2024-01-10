<?php

namespace App\Filament\Resources\AnnualReportingResource\Pages;

use App\Filament\Resources\AnnualReportingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnnualReporting extends EditRecord
{
    protected static string $resource = AnnualReportingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
