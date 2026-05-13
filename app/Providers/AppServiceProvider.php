<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.*', function ($view) {
            $websiteSetting = null;

            if (Schema::hasTable('website_settings')) {
                $websiteSetting = WebsiteSetting::current();
            }

            $view->with('websiteSetting', $websiteSetting);
        });
    }
}
