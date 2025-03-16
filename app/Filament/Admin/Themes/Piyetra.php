<?php

namespace App\Filament\Admin\Themes;

use Filament\FontProviders\LocalFontProvider;
use Filament\Panel;
use Hasnayeen\Themes\Contracts\CanModifyPanelConfig;
use Hasnayeen\Themes\Contracts\Theme;

class Piyetra implements CanModifyPanelConfig, Theme
{
    public static function getName(): string
    {
        return 'piyetra';
    }

    public static function getPath(): string
    {
        return 'resources/css/filament/admin/themes/piyetra.css';
    }

    public function getThemeColor(): array
    {
        return [
            'primary' => '#af0061',
        ];
    }

    public function modifyPanelConfig(Panel $panel): Panel
    {
        return $panel
            ->brandLogo('https://assets-global.website-files.com/5fca4f8b98090baf5505d4c7/6144a049ec60fc05d85571c7_piyetra_logo.svg')
            ->darkMode(false)
            ->font(
                'Izmir',
                url: asset('fonts/font.css'),
                provider: LocalFontProvider::class,
            )
            ->brandName('Piyetra Cms')
            ->viteTheme($this->getPath());
    }
}
