<?php

namespace App\Filament\Pages;

use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Pengguna;
use Filament\Pages\Dashboard;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Filament\Widgets\RecentPatients;
use App\Filament\Widgets\RecentExaminations;
use App\Models\Obat;

class MainDashboard extends Dashboard
{
    public function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class,

        ];
    }

    public function getStats(): array
    {
        return [
            Stat::make('Jumlah Pasien', Pasien::count()),
            Stat::make('Jumlah Pemeriksaan', Pemeriksaan::count()),
            Stat::make('Jumlah Pengguna', Pengguna::count()),
            Stat::make('Jumlah Pengguna', Obat::count()),
        ];
    }
}
