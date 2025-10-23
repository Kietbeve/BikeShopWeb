<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginColltroller;
use App\Http\Controllers\AddProductController;;
use Illuminate\Support\Facades\DB;


// không thể tới view thông qua các route trên xin hãy chỉnh sửa (xóa dòng này khi đã khắc phục)
// Route cho admin
Route::get('/dangnhap',[AdminColltroller::class,'index']);
Route::post('/dangnhap',[AdminColltroller::class,'login']);

Route::middleware('CheckAdLoginStatus')->group(function(){
    Route::get('trangtrang',function()  {return view('admin.home.admin');});
    Route::get('bangdieukhien',[AdminColltroller::class, 'dashboard']);
    Route::get('themsanpham',[AdminController::class,'index']);
    Route::get('danhsachsanpham',[AdminController::class,'hienDSSP']);
    Route::get('dangxuat',[AdminColltroller::class, 'logout']);
});
