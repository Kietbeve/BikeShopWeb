<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
//Khai bao controller
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\AddProductCategoryController;
use App\Http\Controllers\AdminLoginColltroller;
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

// kiem tra ket noi db
Route::get('/check-db', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Kết nối CSDL thành công!";
    } catch (\Exception $e) {
        return "❌ Lỗi: " . $e->getMessage();
    }
});

// Route trang 404 khi url sai
Route::fallback( function () {return view('userViews/pages/404');});


// Route thang qua controller
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

//
Route::get('/bicycles', [HomeController::class, 'bicycles']);

//Route thang qua view
Route::get('/accessories', function () {return view('userViews/pages/accessories');});
//Route::get('/bicycles', function () {return view('userViews/pages/bicycles');});
Route::get('/cart', function () {return view('userViews/pages/cart');});
Route::get('/parts', function () {return view('userViews/pages/parts');});
Route::get('/single', function () {return view('userViews/pages/single');});
Route::get('/contact', function () {return view('userViews/pages/contact');});
Route::get('/log-in', function () {return view('userViews/pages/log-in');});
Route::get('/sign-up', function () {return view('userViews/pages/sign-up');});