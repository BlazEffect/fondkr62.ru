<?php

namespace App\Filament\Resources\ShortTermPlanResource\Pages;

use App\Filament\Resources\ShortTermPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShortTermPlans extends ListRecords
{
    protected static string $resource = ShortTermPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
