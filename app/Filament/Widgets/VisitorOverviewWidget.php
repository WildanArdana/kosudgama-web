<?php

// app/Filament/Widgets/VisitorOverviewWidget.php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VisitorOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 0; // Tampilkan di paling atas

    protected function getStats(): array
    {
        // Total pengunjung hari ini
        $todayVisits = Visitor::whereDate('date', Carbon::today())->sum('visits');

        // Total pengunjung minggu ini (Senin - sekarang)
        $thisWeekVisits = Visitor::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('visits');

        // Total pengunjung bulan ini
        $thisMonthVisits = Visitor::whereMonth('date', Carbon::now()->month)->sum('visits');

        return [
            Stat::make('Pengunjung Hari Ini', $todayVisits)
                ->description('Total kunjungan untuk hari ini')
                ->color('success'),
            Stat::make('Pengunjung Minggu Ini', $thisWeekVisits)
                ->description('Total kunjungan sejak Senin')
                ->color('warning'),
            Stat::make('Pengunjung Bulan Ini', $thisMonthVisits)
                ->description('Total kunjungan di bulan ini')
                ->color('info'),
        ];
    }
}