<?php

namespace App\Filament\Pages;

use BackedEnum;
use UnitEnum;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;

use App\Settings\ProfileSettings;
use Filament\Schemas\Components\Section;

class ManageProfile extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = "Website";

    protected static ?string $navigationLabel = "Profil";

    protected static string $settings = ProfileSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Visi dan Misi')
                    ->schema([
                        Textarea::make('vision')
                            ->label('Visi')
                            ->rows(6)
                            ->columnSpanFull()
                            ->required(),
                        RichEditor::make('mission')
                            ->label('Misi')
                            ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                ['undo', 'redo'],
                            ])
                            ->columnSpanFull()
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->collapsible(),
            ]);
    }
}
