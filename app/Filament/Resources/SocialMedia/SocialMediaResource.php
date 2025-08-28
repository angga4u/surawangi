<?php

namespace App\Filament\Resources\SocialMedia;

use App\Filament\Resources\SocialMedia\Pages\CreateSocialMedia;
use App\Filament\Resources\SocialMedia\Pages\EditSocialMedia;
use App\Filament\Resources\SocialMedia\Pages\ListSocialMedia;
use App\Filament\Resources\SocialMedia\Schemas\SocialMediaForm;
use App\Filament\Resources\SocialMedia\Tables\SocialMediaTable;
use App\Models\SocialMedia;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class SocialMediaResource extends Resource
{
    protected static ?string $model = SocialMedia::class;

    protected static string|BackedEnum|null $navigationIcon = "bi-instagram";

    protected static ?string $navigationLabel = 'Media Sosial';

    protected static string|UnitEnum|null $navigationGroup = "Website";

    protected static ?string $modelLabel = 'Media Sosial';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return SocialMediaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SocialMediaTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSocialMedia::route('/'),
            'create' => CreateSocialMedia::route('/create'),
            'edit' => EditSocialMedia::route('/{record}/edit'),
        ];
    }
}
