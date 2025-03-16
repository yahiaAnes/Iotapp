<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use App\Models\Crops;
use App\Models\Farm;

class Blockchain extends Page
{
    
    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?int $navigationSort = 5; 

    protected static ?string $navigationGroup = 'Blockchain';

    protected static string $view = 'filament.user.pages.blockchain';

    public array $crops = [];
    public array $farms = [];

    public function mount()
    {
        // Fetch all crops with their farm relationships
        $this->crops = Crops::with('farm')->get()->toArray();

        // Fetch all farms with their crops and sensors
        $this->farms = Farm::with(['crops', 'sensors'])->get()->toArray();
    }
}
