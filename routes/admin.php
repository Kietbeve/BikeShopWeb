<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginColltroller;
use App\Http\Controllers\AddProductController;;
use Illuminate\Support\Facades\DB;


// không thể tới view thông qua các route trên xin hãy chỉnh sửa (xóa dòng này khi đã khắc phục)
// Route cho admin
Route::get('/dangnhap',[AdminLoginColltroller::class,'index']);
Route::post('/dangnhap',[AdminLoginColltroller::class,'login']);

Route::middleware('CheckAdLoginStatus')->group(function(){
    Route::get('trangtrang',function()  {return view('admin.home.admin');});
    Route::get('bangdieukhien',[AdminLoginColltroller::class, 'dashboard']);
    Route::get('themsanpham',[AddProductController::class,'index']);
    Route::get('danhsachsanpham',[AddProductController::class,'hienDSSP']);
    Route::get('dangxuat',[AdminLoginColltroller::class, 'logout']);
});
