<?php

namespace noob\simple_menu_laravel;

use Illuminate\Support\ServiceProvider;

class SimpleMenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('Simple-Menu', function() {
            return new \noob\simple_menu_laravel\SimpleMenu;
        });
    }
}
