<?php

namespace App\Providers;

use App\Http\Service\BladeService;
use App\Http\Service\BladeServiceInterface;
use App\Http\Service\PdfService;
use App\Http\Service\PdfServiceInterface;
use App\Http\Service\RequestToObjectService;
use App\Http\Service\RequestToObjectServiceInterface;
use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            RequestToObjectServiceInterface::class,
            RequestToObjectService::class
        );

        $this->app->singleton(
            BladeServiceInterface::class,
            BladeService::class
        );

        $this->app->singleton(
            PdfServiceInterface::class,
            PdfService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
