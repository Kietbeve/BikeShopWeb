<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\DB;

// route kiểm tra kết nối db
Route::get('/check-db', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Kết nối CSDL thành công!";
    } catch (\Exception $e) {
        return "❌ Lỗi: " . $e->getMessage();
    }
});

Route::get('/', function () {
    return view('welcome');
});
Route::get("/product",[ProductController::class,"home"]);
Route::get("/product/list",[ProductController::class,"list"]);
Route::get("/product/list/detail",[ProductController::class,"detail"]);
Route::get("/product/cart",[ProductController::class,"cart"]);
Route::get("/product/contact",[ProductController::class,"contact"]);
// dùng để xử lý form lấy hàm từ controller (18/9/2025) kietbeve da sua lai (18/9/2025)
Route::post('/product/contact', [ProductController::class, 'sign_up'])->middleware('check.data')->name('custommer.contact'); // POST
//18/09/2025 kietbeve viet route khi khong tim thay route nao
Route::fallback(function(){
    return view("customer.error");
});
