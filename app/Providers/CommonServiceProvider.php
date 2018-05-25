<?php
/**
 * Created by PhpStorm.
 * User: xumu
 * Date: 2018/5/1
 * Time: 12:04
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('CommonService', function () {
            return new \App\Services\CommonUnits();
        });
    }
}