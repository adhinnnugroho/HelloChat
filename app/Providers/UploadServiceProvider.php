<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UploadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path() . '/Helpers/Upload.php';
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
