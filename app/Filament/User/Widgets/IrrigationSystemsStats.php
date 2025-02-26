<?php

namespace App\Filament\User\Widgets;

use App\Models\IrrigationSystem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IrrigationSystemsStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        $userId = Auth::id();

        $totalSystems = IrrigationSystem::whereHas('farm', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        $activeSystems = IrrigationSystem::whereHas('farm', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('status', true)->count();

        $lastRun = IrrigationSystem::whereHas('farm', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->latest('last_run')->value('last_run');

        return [
            Card::make('Total Irrigation Systems', $totalSystems)
                ->description('Total registered irrigation systems')
                ->icon('heroicon-o-cloud')
                ->color('primary'),

            Card::make('Active Systems', $activeSystems)
                ->description('Currently running systems')
                ->icon('heroicon-o-check-circle')
                ->color($activeSystems > 0 ? 'success' : 'danger'),

            Card::make('Last Run', $lastRun ? Carbon::parse($lastRun)->format('Y-m-d H:i') : 'Never')
                ->description('Last irrigation system operation')
                ->icon('heroicon-o-clock')
                ->color('info'),
        ];
    }
}
