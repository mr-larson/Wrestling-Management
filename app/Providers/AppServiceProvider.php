<?php

namespace App\Providers;

use App\Models\Promotion;
use App\Models\Tournament;
use App\Models\Worker;
use App\Observers\UserActionObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Promotion::observe(UserActionObserver::class);
        Worker::observe(UserActionObserver::class);
        Tournament::observe(UserActionObserver::class);
    }
}
