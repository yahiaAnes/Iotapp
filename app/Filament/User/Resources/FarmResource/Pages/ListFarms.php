<?php

namespace App\Filament\User\Resources\FarmResource\Pages;

use App\Filament\User\Resources\FarmResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFarms extends ListRecords
{
    protected static string $resource = FarmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
