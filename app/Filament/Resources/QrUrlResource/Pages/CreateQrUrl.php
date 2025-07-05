<?php

namespace App\Filament\Resources\QrUrlResource\Pages;

use App\Filament\Resources\QrUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateQrUrl extends CreateRecord
{
    protected static string $resource = QrUrlResource::class;

    
    protected function getHeaderActions(): array
    {
        return [
            // Don't return CreateAction here, this hides the button
        ];
    }
}
