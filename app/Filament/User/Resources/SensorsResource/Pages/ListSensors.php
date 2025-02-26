<?php

namespace App\Filament\User\Resources\SensorsResource\Pages;

use App\Filament\User\Resources\SensorsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSensors extends ListRecords
{
    protected static string $resource = SensorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
