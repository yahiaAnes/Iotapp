<?php

namespace App\Filament\User\Resources\CropsResource\Pages;

use App\Filament\User\Resources\CropsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCrops extends EditRecord
{
    protected static string $resource = CropsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
