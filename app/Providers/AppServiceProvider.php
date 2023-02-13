<?php

namespace App\Providers;

use App\Services\Autocomplete\AutocompleteService;
use App\Services\Autocomplete\FakerSourceClient;
use App\Services\Autocomplete\SourceClientInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //AUTOCOMPLETE SERVICE
        $this->app->bind(AutocompleteService::class, function ($app) {
            return new AutocompleteService($app->make(SourceClientInterface::class));
        });

        $this->app->bind(SourceClientInterface::class, FakerSourceClient::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
