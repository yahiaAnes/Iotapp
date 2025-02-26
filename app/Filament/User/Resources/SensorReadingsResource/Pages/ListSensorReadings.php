<?php

namespace App\Filament\User\Resources\SensorReadingsResource\Pages;

use App\Filament\User\Resources\SensorReadingsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSensorReadings extends ListRecords
{
    protected static string $resource = SensorReadingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
