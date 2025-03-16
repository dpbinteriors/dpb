<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use BezhanSalleh\FilamentGoogleAnalytics\Widgets;

class AnalyticsDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static string $view = 'filament.pages.analytics-dashboard';

    protected function getHeaderWidgets(): array
    {
        $widgets = [];

        if (env('ANALYTICS_PROPERTY_ID')) {
            $widgets =[
                Widgets\PageViewsWidget::class,
                Widgets\VisitorsWidget::class,
                Widgets\ActiveUsersOneDayWidget::class,
                Widgets\ActiveUsersSevenDayWidget::class,
                Widgets\ActiveUsersTwentyEightDayWidget::class,
                Widgets\SessionsWidget::class,
                Widgets\SessionsDurationWidget::class,
                Widgets\SessionsByCountryWidget::class,
                Widgets\SessionsByDeviceWidget::class,
                Widgets\MostVisitedPagesWidget::class,
                Widgets\TopReferrersListWidget::class,
            ];
        }

        return $widgets;
    }


    public function getTitle(): string
    {
        return __('panel.dashboard');
    }

    public static function getNavigationLabel(): string
    {
        return __('panel.dashboard');
    }

    public function getSubheading(): string|null
    {
        if (env('ANALYTICS_PROPERTY_ID')){
            return null;
        }
        return __('panel.analytics-integration-warning');

    }
}
