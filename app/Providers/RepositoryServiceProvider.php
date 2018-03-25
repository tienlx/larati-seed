<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $repositories = [
             \App\Repositories\UserRepositoryInterface::class => \App\Repositories\Eloquent\UserRepository::class,
        ];

        foreach ($repositories as $interface => $repository) {
            $this->app->singleton($interface, $repository);
        }
    }
}
