<?php

namespace App\Filament\Resources\Achievements\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AchievementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('organizer')
                    ->label('Penyelenggara')
                    ->maxLength(255)
                    ->required(),
                FileUpload::make('image')
                    ->label('Foto')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '1:1',
                    ])
                    ->openable()
                    ->maxSize(10240)
                    ->disk('public')
                    ->directory('achievement-photo')
                    ->visibility('public')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->rows(4)
                    ->maxLength(1024)
                    ->columnSpanFull()
            ]);
    }
}
