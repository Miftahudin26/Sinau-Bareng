<?php

namespace App\Providers;

use App\Models\TransaksiBahanBaku;
use Illuminate\Support\ServiceProvider;
use App\Observers\TransaksiBahanBakuObserver;

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
        //

    }
}
