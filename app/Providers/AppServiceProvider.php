<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\InfoShop;

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
        $shops = InfoShop::first();

        // Chia sẻ dữ liệu này tới tất cả các view
        view()->share('shops', $shops);
    }
}
