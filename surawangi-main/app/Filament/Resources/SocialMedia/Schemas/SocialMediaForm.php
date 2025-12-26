<?php

namespace App\Filament\Resources\SocialMedia\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class SocialMediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('platform')
                    ->options([
                        'instagram' => 'Instagram',
                        'tiktok' => 'Tiktok',
                        'twitter' => 'X',
                        'facebook' => 'Facebook',
                        'youtube' => 'Youtube'
                    ])
                    ->required(),
                TextInput::make('url')
                    ->label('Link')
                    ->maxLength(255)
                    ->required(),
            ]);
    }
}
