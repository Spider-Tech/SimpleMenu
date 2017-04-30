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
        
          $this->publishes([
              base_path('packages/noob/simple_menu_laravel/src/config/menu.php') => config_path('menu.php'),
        ]);
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
