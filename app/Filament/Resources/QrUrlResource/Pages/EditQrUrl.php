<?php

namespace App\Filament\Resources\QrUrlResource\Pages;

use App\Filament\Resources\QrUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQrUrl extends EditRecord
{
    protected static string $resource = QrUrlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
