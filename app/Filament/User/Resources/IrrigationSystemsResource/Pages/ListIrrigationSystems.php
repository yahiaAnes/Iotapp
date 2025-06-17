<?php

namespace App\Filament\User\Resources\IrrigationSystemsResource\Pages;

use App\Filament\User\Resources\IrrigationSystemsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIrrigationSystems extends ListRecords
{
    protected static string $resource = IrrigationSystemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
