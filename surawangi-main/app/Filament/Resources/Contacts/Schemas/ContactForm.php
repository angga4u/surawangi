<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('platform')
                    ->options([
                        'email' => 'Email',
                        'phone' => 'Telepon',
                        'address' => 'Alamat',
                    ])
                    ->required(),
                TextInput::make('contact')
                    ->label('Kontak')
                    ->maxLength(255)
                    ->required(),
            ]);
    }
}
