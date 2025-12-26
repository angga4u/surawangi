<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class CategoryChart extends ChartWidget
{
    protected int|string|array $columnSpan = '1/2';
    protected ?string $heading = 'Tren Kategori';

    protected function getData(): array
    {
        $result = Category::select('categories.name', DB::raw('SUM(posts.views) as views'))
            ->join('posts', 'categories.id', '=', 'posts.category_id')
            ->where('posts.created_at', '>=', now()->subDays(7))
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('views')
            ->limit(5)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Pembaca',
                    'data'  => $result->pluck('views')->toArray(),
                    'backgroundColor' => '#f59e0b',
                ],
            ],
            'labels' => $result->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
