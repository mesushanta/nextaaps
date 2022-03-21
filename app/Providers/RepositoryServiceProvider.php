<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\BusinessRepositoryInterface;
use App\Repositories\BusinessRepository;
use App\Interfaces\SearchRepositoryInterface;
use App\Repositories\SearchRepository;
use App\Interfaces\CountryRepositoryInterface;
use App\Repositories\CountryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BusinessRepositoryInterface::class, BusinessRepository::class);
        $this->app->bind(SearchRepositoryInterface::class, SearchRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
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
