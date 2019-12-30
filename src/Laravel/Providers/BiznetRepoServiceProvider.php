<?php

namespace Biznetrepo\Laravel\Providers;

use Illuminate\Support\ServiceProvider;

class BiznetRepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * cotracts
         */
        app()->bind('Biznetrepo\Laravel\Contracts\Services\ApiServicesContract', 'Biznetrepo\Laravel\Services\ApiServices');

        /**
         * facades
         */
        app()->bind('site.area',function(){
            return new \Biznetrepo\Laravel\Repositories\Sites\AreaRepository();
        });

        /**
         * publish config file
         *
         * @return void
         */
        $this->publishes(
            [
                __DIR__ . "/../config/api_biznet.php" => config_path('api_biznet.php')
            ],
            'bizetrepo'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
