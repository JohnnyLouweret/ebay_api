<?php

namespace App\Providers;

use App\ApiConnections\ApiConnection;
use App\ApiConnections\EbayApiConnection;
use App\Objects\Enum\ProvidersEnum;
use App\Service\FeedProvider;
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
        $this->app->bind(FeedProvider::class, function ($app) {
            return new FeedProvider($app->make(ApiConnection::class));
        });

        $this->app->bind(ApiConnection::class, function () {
            return new EbayApiConnection(ProvidersEnum::createEbay());
        });
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
