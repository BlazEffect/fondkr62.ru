<?php

namespace App\Filament\Resources\RegulatoryBaseSectionResource\Pages;

use App\Filament\Resources\RegulatoryBaseSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegulatoryBaseSection extends EditRecord
{
    protected static string $resource = RegulatoryBaseSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
