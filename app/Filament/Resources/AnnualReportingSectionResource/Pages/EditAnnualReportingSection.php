<?php

namespace App\Filament\Resources\AnnualReportingSectionResource\Pages;

use App\Filament\Resources\AnnualReportingSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnnualReportingSection extends EditRecord
{
    protected static string $resource = AnnualReportingSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
