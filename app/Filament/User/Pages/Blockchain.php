<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use App\Models\Crops;
use App\Models\Farm;
use App\Models\QrUrl;
use Illuminate\Http\Request;

class Blockchain extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?int $navigationSort = 5; 
    protected static ?string $navigationGroup = 'Blockchain';
    protected static string $view = 'filament.user.pages.blockchain';

    public array $crops = [];
    public array $farms = [];
    public ?QrUrl $qrUrl = null;

    public function mount()
    {
        $this->refreshCrops();
    }

    // Add this method to handle the POST request
    public static function getRoutes(): array
    {
        return [
            'post' => [
                'send-to-blockchain' => 'sendToBlockchain',
            ],
        ];
    }

    public function refreshCrops()
    {
       
        $this->crops = Crops::with(['farm' => function($query) {
                $query->where('user_id', auth()->id());
            }])
            ->where('user_id', auth()->id())
            ->get()
            ->toArray();

        $this->farms = Farm::with(['crops' => function($query) {
                $query->where('user_id', auth()->id());
            }, 'sensors'])
            ->where('user_id', auth()->id())
            ->get()
            ->toArray();
            
        $this->qrUrl = QrUrl::first();
    }

}