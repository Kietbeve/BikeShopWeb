<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Nguoidung; // model Người dùng
use Illuminate\Support\Facades\View; // Thư viện dùng để share csdl cho view bất kì mà không cần return
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // hàm chia sẽ model người dùng sang view admin.partials.header
        View::composer('admin.partials.header', function ($view) {
        $view->with('admin', nguoidung::where('chucvu','like','%admin%')->first());
    });
    }
}
