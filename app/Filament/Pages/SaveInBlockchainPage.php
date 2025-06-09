<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use App\Models\BlockchainRequest;

class SaveInBlockchainPage extends Page
{
    protected static ?string $navigationIcon = '';
    protected static ?string $title = 'Save to Blockchain';
    protected static string $view = 'filament.pages.save-in-blockchain-page';

    public $requests;

    public function mount(): void
    {
        $this->requests = BlockchainRequest::with('farmer')->latest()->get();
    }
}