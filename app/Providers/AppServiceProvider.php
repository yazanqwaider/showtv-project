<?php

namespace App\Providers;

use App\Models\Show;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFive();

        try {
            $random_shows = Show::inRandomOrder()->limit(5)->get();
            view()->share('random_shows', $random_shows);
        } catch (\Throwable $th) {
        }
    }
}
