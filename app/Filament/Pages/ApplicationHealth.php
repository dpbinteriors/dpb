<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use ShuvroRoy\FilamentSpatieLaravelBackup\Pages\Backups as BaseBackups;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use ShuvroRoy\FilamentSpatieLaravelHealth\Pages\HealthCheckResults;

class ApplicationHealth extends HealthCheckResults
{
    use HasPageShield;

    public static function getNavigationGroup(): ?string
    {
        return __('panel.application-settings');
    }

}
