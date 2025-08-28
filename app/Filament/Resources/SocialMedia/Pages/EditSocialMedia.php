<?php

namespace App\Filament\Resources\SocialMedia\Pages;

use App\Filament\Resources\SocialMedia\SocialMediaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSocialMedia extends EditRecord
{
    protected static string $resource = SocialMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
