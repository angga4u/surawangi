<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Carbon;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->maxLength(255)
                    ->required(),
                Select::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Publikasi', 'archived' => 'Arsip'])
                    ->default('draft')
                    ->required(),
                RichEditor::make('content')
                    ->label('Isi')
                    ->columnSpanFull()
                    ->required(),
                FileUpload::make('thumbnail')
                    ->label('Gambar')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->openable()
                    ->maxSize(10240)
                    ->disk('public')
                    ->directory('post-thumbnail')
                    ->visibility('public')
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('published_at')->label('Waktu Publikasi')->default(Carbon::now()),
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->required(),
            ]);
    }}
