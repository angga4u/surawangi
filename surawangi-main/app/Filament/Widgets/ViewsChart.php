<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ViewsChart extends ChartWidget
{
    protected int|string|array $columnSpan = '1/2';
    protected ?string $heading = 'Tren Pembaca (7 Hari)';

    protected function getData(): array
    {
        $data = Post::select(
            DB::raw('DATE(published_at) as date'),
            DB::raw('SUM(views) as total_views')
        )
            ->where('published_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Pembaca',
                    'data' => $data->pluck('total_views'),
                ],
            ],
            'labels' => $data->pluck('date'),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
