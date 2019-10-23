<?php

namespace KomjIT\Barion;

use Illuminate\Support\ServiceProvider;

class BarionServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->registerHelpers();
    }

    public function register()
    {

    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {
        if (file_exists($file = __DIR__.'/Models/Helpers/BarionHelper.php'))
        {
            require $file;
        }
    }
}
