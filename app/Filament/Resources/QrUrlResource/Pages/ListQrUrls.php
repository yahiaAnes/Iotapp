<?php

namespace App\Filament\Resources\QrUrlResource\Pages;

use App\Filament\Resources\QrUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQrUrls extends ListRecords
{
    protected static string $resource = QrUrlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
