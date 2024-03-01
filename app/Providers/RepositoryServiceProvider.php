<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     */
    public array $bindings = [];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     *  Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
    }
}
