<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\InfoShop;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

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
        View::share('cartCount', $this->getCartCount());
    }
    private function getCartCount()
    {
        // Lấy số lượng sản phẩm trong giỏ hàng từ session
        $productsInSession = Session::get('products', []);
        return count($productsInSession); // Đếm số sản phẩm
    }
}
