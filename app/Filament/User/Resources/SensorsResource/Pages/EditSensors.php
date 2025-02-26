<?php

namespace App\Filament\User\Resources\SensorsResource\Pages;

use App\Filament\User\Resources\SensorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSensors extends EditRecord
{
    protected static string $resource = SensorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
