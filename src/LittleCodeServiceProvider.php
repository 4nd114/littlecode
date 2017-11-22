<?php

namespace Andre\LittleCode;

use Illuminate\Support\ServiceProvider;

class LittleCodeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

         require __DIR__.'/routes/routes.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('andre-littlecode', function(){
            return new LittleCode();
        });
    }
}
