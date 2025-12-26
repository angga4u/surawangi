<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->maxLength(255)
                    ->required(),
                Select::make('page_type')
                    ->label('Halaman')
                    ->options(['home' => "Beranda", 'profile' => "Profil", 'category' => "Kategori"])
                    ->live(onBlur: true, debounce: 500)
                    ->required(),
                Textarea::make('description')->label('Deskripsi')->maxLength(2048)->nullable()->columnSpanFull(),
                FileUpload::make('thumbnail')
                    ->label('Gambar')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                    ])
                    ->openable()
                    ->maxSize(10240)
                    ->disk('public')
                    ->directory('banner-thumbnail')
                    ->visibility('public')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('cta_url')
                    ->maxLength(255)
                    ->label('URL CTA'),
                TextInput::make('cta_text')
                    ->maxLength(2048)
                    ->label('Teks CTA'),
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->hiddenJs(<<<'JS'
                        $get('page_type') !== 'category'
                        JS)
                    ->required(fn(Get $get): bool => $get('page_type') === 'category'),
                Toggle::make('is_active')
                    ->label('Aktifkan')
                    ->default(true)
                    ->required(),
            ]);
    }
}
