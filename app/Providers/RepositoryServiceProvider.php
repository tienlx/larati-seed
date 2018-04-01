<?php

namespace App\Providers;

use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\UserRepository;
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
            'UserRepository',
            'PostRepository',
        ];

        foreach ($repositories as $repository) {
            $interfaceClass = 'App\\Repositories\\' . $repository;
            $repositoryClass = 'App\\Repositories\\Eloquent\\' . $repository . 'Eloquent';
            $this->app->singleton($interfaceClass, $repositoryClass);
        }
    }
}
