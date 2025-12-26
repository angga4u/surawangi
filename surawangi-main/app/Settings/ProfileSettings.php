<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ProfileSettings extends Settings
{
    public string $vision = '';

    public string $mission = '';

    public static function group(): string
    {
        return 'profile';
    }
}