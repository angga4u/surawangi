<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Post;

class NewsStatOverview extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'full';

    protected ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Pembaca', number_format(Post::sum('views')))
                ->description('Semua berita')
                ->icon('heroicon-o-eye')
                ->color('success'),

            Stat::make('Total Berita', Post::where('status', 'published')->count())
                ->description('Dipublikasikan')
                ->icon('heroicon-o-document-text')
                ->color('primary'),

            Stat::make('Draf Berita ', Post::where('status', 'draft')->count())
                ->description('Dirancang')
                ->icon('heroicon-o-document-text')
                ->color('gray'),
        ];
    }
}
