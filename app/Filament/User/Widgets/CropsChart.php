<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Crops;
use Illuminate\Support\Facades\Auth;
class CropsChart extends ChartWidget
{
    protected static ?string $heading = 'Crop Planting Trends';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $crops = Crops::selectRaw('DATE(planting_date) as date, COUNT(*) as count')
            ->whereHas('farm', function ($query) {
                $query->where('user_id', Auth::id()); // Only show crops for logged-in user
            })
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Crops Planted',
                    'data' => $crops->pluck('count')->toArray(),
                    'borderColor' => '#4CAF50', // Green Line Color
                    'backgroundColor' => 'rgba(76, 175, 80, 0.2)', // Light Green Fill
                    'fill' => true,
                ],
            ],
            'labels' => $crops->pluck('date')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
