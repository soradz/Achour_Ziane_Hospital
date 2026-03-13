<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        require_once app_path('Helpers/LabHelper.php');

        // Force HTTPS in production (Railway reverse proxy)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}