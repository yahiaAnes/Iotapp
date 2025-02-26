<?php

namespace App\Filament\User\Resources\IrrigationSystemsResource\Pages;

use App\Filament\User\Resources\IrrigationSystemsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIrrigationSystems extends EditRecord
{
    protected static string $resource = IrrigationSystemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
