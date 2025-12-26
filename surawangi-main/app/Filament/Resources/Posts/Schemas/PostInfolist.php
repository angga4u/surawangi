<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns([
                        'sm' => 1,
                        'xl' => 2,
                    ])
                    ->schema([
                        ImageEntry::make('thumbnail')
                            ->label('Gambar')
                            ->disk('public')
                            ->visibility('public')
                            ->square(),

                        Grid::make(1)->schema([
                            TextEntry::make('title')
                                ->label('Judul')
                                ->weight('bold'),

                            Flex::make([
                                TextEntry::make('status')
                                    ->badge()
                                    ->color(fn(string $state): string => match ($state) {
                                        'published' => 'success',
                                        'draft' => 'warning',
                                        'archived' => 'gray',
                                        default => 'secondary',
                                    })
                                    ->formatStateUsing(fn(string $state): string => match ($state) {
                                        'published' => 'Dipublikasi',
                                        'draft' => 'Draf',
                                        'archived' => 'Diarsipkan',
                                        default => '',
                                    }),

                                TextEntry::make('category.name')
                                    ->label('Kategori')
                                    ->badge()
                                    ->color('primary'),
                            ]),

                            TextEntry::make('views')
                                ->label('Jumlah Pembaca')
                                ->numeric()
                                ->badge()
                                ->color('success'),

                            TextEntry::make('publisher.name')
                                ->label('Nama Penulis')
                                ->weight('medium'),
                        ]),
                    ])->columnSpanFull(),

                Section::make('Konten')
                    ->schema([
                        TextEntry::make('content')
                            ->hiddenLabel()
                            ->html(),
                    ])->columnSpanFull(),

                Section::make('Timeline')
                    ->schema([
                        Grid::make(3)->schema([
                            TextEntry::make('published_at')
                                ->label('Dipublikasikan')
                                ->dateTime('d M Y H:i'),

                            TextEntry::make('created_at')
                                ->label('Dibuat')
                                ->dateTime('d M Y H:i'),

                            TextEntry::make('updated_at')
                                ->label('Diperbarui')
                                ->dateTime('d M Y H:i'),
                        ]),
                    ])->columnSpanFull(),
            ]);
    }
}
