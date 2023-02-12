<?php

namespace App\Providers;

use App\Services\Autocomplete\AutocompleteService;
use App\Services\Autocomplete\SourceClientInterface;
use Illuminate\Support\ServiceProvider;
use Tests\Mocks\AutocompleteSourceClientMock;

class TestServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SourceClientInterface::class, AutocompleteSourceClientMock::class);

        $this->app->bind(AutocompleteService::class, function ($app) {
            return new AutocompleteService($app->make(SourceClientInterface::class));
        });
    }
}