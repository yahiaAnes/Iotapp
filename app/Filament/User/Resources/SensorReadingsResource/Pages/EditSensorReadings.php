<?php

namespace App\Filament\User\Resources\SensorReadingsResource\Pages;

use App\Filament\User\Resources\SensorReadingsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSensorReadings extends EditRecord
{
    protected static string $resource = SensorReadingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
