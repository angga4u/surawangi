<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->label('Kategori')->required()->maxLength(255),
                Textarea::make('description')->label('Deskripsi')->maxLength(2048)->columnSpanFull()
            ]);
    }
}
