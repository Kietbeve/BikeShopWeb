<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;


// không thể tới view thông qua các route trên xin hãy chỉnh sửa (xóa dòng này khi đã khắc phục)
// Route cho admin
Route::get('/login',[AdminLoginController::class,'index']);
Route::post('/login',[AdminLoginController::class,'login'])->name('admin.login');

Route::middleware('CheckAdLoginStatus')->group(function(){
    // Route::get('trangtrang',function()  {return view('admin.home.admin');});
    Route::get('dashboard',[AdminLoginController::class, 'dashboard']);
    // Route::get('themsanpham', function(){
    //     return view('admin.pages.addproduct');
    // });
    Route::get('addproduct', [CategoryController::class, 'getCategory']);
    Route::post('addproduct',[ProductController::class,'addProduct'])->name('themsanpham');
    Route::get('products',[ProductController::class,'getProduct']);
    Route::get('logout',[AdminLoginController::class, 'logout']);
});
