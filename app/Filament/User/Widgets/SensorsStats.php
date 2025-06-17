<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Sensors;
use App\Models\SensorReadings;

class SensorsStats extends BaseWidget
{
    protected static ?int $sort = 2; 
    protected static ?string $pollingInterval = '10s'; 

    protected function getCards(): array
    {
        $latestReading = SensorReadings::where('timestamp', '!=', '1970-01-01 00:00:00')
            ->latest('timestamp')
            ->first();

        return [
            Card::make('Active Sensors', Sensors::where('status', true)->count())
                ->description('Currently functioning sensors')
                ->color('success'),

            Card::make('Inactive Sensors', Sensors::where('status', false)->count())
                ->color('danger'),

            Card::make(
                'Latest Moisture',
                $latestReading ? $latestReading->value . ' ' . $latestReading->unit : 'No Data'
            )
                ->description(
                    $latestReading
                        ? 'Last received at ' . $latestReading->timestamp
                        : 'No valid readings yet'
                )
                ->color('info'),
        ];
    }
}
