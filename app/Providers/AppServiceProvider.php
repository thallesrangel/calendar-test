<?php

namespace App\Providers;

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
        $this->app->bind('App\Repositories\Contracts\PeopleRepositoryInterface', 'App\Repositories\PeopleRepositoryEloquent');
        $this->app->bind('App\Repositories\Contracts\ClassesRepositoryInterface', 'App\Repositories\ClassesRepositoryEloquent');
        $this->app->bind('App\Repositories\Contracts\CheckerRepositoryInterface', 'App\Repositories\CheckerRepositoryEloquent');
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
