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
//            ->brandLogo('https://www.dpbinteriors.com/build/assets/logo-d80cffa1.svg')
            ->darkMode(false)
            ->font(
                'Izmir',
                url: asset('fonts/font.css'),
                provider: LocalFontProvider::class,
            )
            ->brandName('dPb Cms')
            ->viteTheme($this->getPath());
    }
}
