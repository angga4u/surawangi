<?php

namespace App\Filament\Resources\Staff\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StaffForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('position')
                    ->label('Jabatan')
                    ->maxLength(255)
                    ->required(),
                FileUpload::make('photo')
                    ->label('Foto')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '1:1',
                    ])
                    ->openable()
                    ->maxSize(10240)
                    ->disk('public')
                    ->directory('staff-photo')
                    ->visibility('public')
                    ->columnSpanFull(),
                Textarea::make('bio')
                    ->rows(4)
                    ->maxLength(1024)
                    ->columnSpanFull()
            ]);
    }
}
