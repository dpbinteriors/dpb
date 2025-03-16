<?php

namespace App\Providers\Filament;

use App\Filament\Admin\Themes\Piyetra;
use App\Filament\Pages\ApplicationHealth;
use App\Filament\Pages\Backups;
//use BezhanSalleh\FilamentLanguageSwitch\FilamentLanguageSwitchPlugin;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\SpatieLaravelTranslatablePlugin;
use Filament\Support\Assets\Css;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentAsset;
use Filament\Widgets;
use Hasnayeen\Themes\ThemesPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use pxlrbt\FilamentEnvironmentIndicator\EnvironmentIndicatorPlugin;
use ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackupPlugin;
use ShuvroRoy\FilamentSpatieLaravelHealth\FilamentSpatieLaravelHealthPlugin;
use ShuvroRoy\FilamentSpatieLaravelHealth\Pages\HealthCheckResults;
use SolutionForest\FilamentTranslateField\FilamentTranslateFieldPlugin;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Facades\Health;
use TomatoPHP\FilamentTranslations\FilamentTranslationsPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function boot(): void
    {
        Model::unguard();
        FilamentAsset::register([
            Css::make('filament-extended', __DIR__ . '/../../../resources/css/filament-extended.css'),
        ]);

        Health::checks([
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
        ]);
    }
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()

            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])->plugins(
                [
                    ThemesPlugin::make()
                        ->registerTheme([Piyetra::getName() => Piyetra::class], override: true)->canViewThemesPage(fn() => false),
                    FilamentShieldPlugin::make(),
                    FilamentSpatieLaravelHealthPlugin::make()
                        ->usingPage(ApplicationHealth::class),
                    EnvironmentIndicatorPlugin::make()->showBadge(true),
                    FilamentSpatieLaravelBackupPlugin::make()->usingPage(Backups::class),
//                    FilamentLanguageSwitchPlugin::make(),
                    SpatieLaravelTranslatablePlugin::make()
                        ->defaultLocales(config('app.supported_locales')),
                    FilamentTranslateFieldPlugin::make(config('app.supported_locales')),
                    FilamentTranslationsPlugin::make(['en'])->allowCreate(true)->allowClearTranslations(),
                ]
            )->tenantMiddleware([
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class
            ]);
    }
}

