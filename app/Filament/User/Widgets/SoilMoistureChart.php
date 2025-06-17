<?php

namespace App\Filament\User\Widgets;

use App\Models\SensorReadings;
use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;

class SoilMoistureChart extends LineChartWidget
{
    protected static ?string $heading = 'Soil Moisture Percentage';
    protected static ?string $pollingInterval = '30s'; // يحدث تلقائيًا كل 30 ثانية
    protected static ?int $sort = 3;

    public function getColumnSpan(): int | string | array
    {
        return 'full';
    }

    protected function getData(): array
    {
        $readings = SensorReadings::where('sensor_id', 1)
            ->orderByDesc('timestamp')
            ->limit(48)
            ->get()
            ->sortBy('timestamp')
            ->values();

        return [
            'datasets' => [
                [
                    'label' => 'Soil Moisture (%)',
                    'data' => $readings->pluck('value')->toArray(),
                    'borderColor' => '#3B82F6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'fill' => true,
                ],
            ],
            'labels' => $readings->pluck('timestamp')->map(fn($ts) => Carbon::parse($ts)->format('H:i'))->toArray(),
            'options' => [
                'scales' => [
                    'y' => [
                        'min' => 0,
                        'max' => 100,
                        'title' => [
                            'display' => true,
                            'text' => 'Moisture (%)',
                        ],
                    ],
                    'x' => [
                        'title' => [
                            'display' => true,
                            'text' => 'Time',
                        ],
                        'ticks' => [
                            'maxTicksLimit' => 48,
                        ],
                    ],
                ],
            ],
        ];
    }
}

