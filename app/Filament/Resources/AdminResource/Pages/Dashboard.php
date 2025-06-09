<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\TotalUsersWidget;
use App\Filament\Widgets\SaveInBlockchainButtonWidget;

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            TotalUsersWidget::class,
            SaveInBlockchainButtonWidget::class, // أضفنا Widget الزر هنا
        ];
    }
}
