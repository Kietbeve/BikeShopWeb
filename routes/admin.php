<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminColltroller;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;


// không thể tới view thông qua các route trên xin hãy chỉnh sửa (xóa dòng này khi đã khắc phục)
// Route cho admin
Route::get('/dangnhap',[AdminColltroller::class,'index']);
Route::post('/dangnhap',[AdminColltroller::class,'login']);

Route::middleware('CheckAdLoginStatus')->group(function(){
    Route::get('trangtrang',function()  {return view('admin.home.admin');});
    Route::get('bangdieukhien',[AdminColltroller::class, 'dashboard']);
    // Route::get('themsanpham', function(){
    //     return view('admin.pages.addproduct');
    // });
    Route::get('themsanpham', [CategoryController::class, 'getCategory']);
    Route::post('themsanpham',[ProductController::class,'addProduct'])->name('themsanpham');
    Route::get('danhsachsanpham',[ProductController::class,'getProduct']);
    Route::get('dangxuat',[AdminColltroller::class, 'logout']);
});
