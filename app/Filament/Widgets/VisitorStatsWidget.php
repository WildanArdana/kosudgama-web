<?php

// app/Filament/Widgets/VisitorStatsWidget.php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class VisitorStatsWidget extends ChartWidget
{
    protected static ?string $heading = 'Statistik Pengunjung (30 Hari Terakhir)';
    protected static ?int $sort = 1; // Urutan widget di dashboard

    protected function getData(): array
    {
        // Ambil data 30 hari terakhir
        $data = Visitor::where('date', '>=', now()->subDays(30))
            ->orderBy('date')
            ->get();

        // Siapkan data untuk chart
        $labels = $data->map(fn (Visitor $visitor) => $visitor->date->format('d M'));
        $visits = $data->map(fn (Visitor $visitor) => $visitor->visits);

        return [
            'datasets' => [
                [
                    'label' => 'Pengunjung Harian',
                    'data' => $visits,
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Jenis chart: line, bar, pie, dll.
    }
}