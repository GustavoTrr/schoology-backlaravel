<?php

namespace App\Providers;

use App\Services\Autocomplete\AutocompleteService;
use App\Services\Autocomplete\FakerSourceClient;
use App\Services\Autocomplete\SourceClientInterface;
use Illuminate\Support\ServiceProvider;

class AutocompleteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AutocompleteService::class, function ($app) {
            return new AutocompleteService($app->make(SourceClientInterface::class));
        });

        $this->app->bind(SourceClientInterface::class, FakerSourceClient::class);
    }
}