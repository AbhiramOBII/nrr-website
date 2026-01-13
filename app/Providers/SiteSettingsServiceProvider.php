<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SiteSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share site settings with all views
        View::composer('*', function ($view) {
            if (Schema::hasTable('site_settings')) {
                $siteSettings = SiteSetting::getAllSettings();
                $view->with('siteSettings', $siteSettings);
            } else {
                $view->with('siteSettings', []);
            }
        });
    }
}
