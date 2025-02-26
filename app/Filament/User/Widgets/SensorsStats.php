<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Sensors;
class SensorsStats extends BaseWidget
{
    protected static ?int $sort = 2; // Controls widget order
    protected static ?string $pollingInterval = '10s'; // Auto-refresh every 10s

    protected function getCards(): array
    {
        return [
            Card::make('Total Sensors', Sensors::count()),
            Card::make('Active Sensors', Sensors::where('status', true)->count())
                ->description('Currently functioning sensors')
                ->color('success'),
            Card::make('Inactive Sensors', Sensors::where('status', false)->count())
                ->color('danger'),
        ];
    }
}
