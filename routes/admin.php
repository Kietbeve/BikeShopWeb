<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductTypeController;

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

    // Route::get('themsanpham', [CategoryController::class, 'setAddProduct']);
    // Route::post('themsanpham',[ProductController::class,'addProduct'])->name('themsanpham');
    // Route::get('danhsachsanpham',[ProductController::class,'getProduct']);
    // Route::get('dangxuat',[AdminLoginController::class, 'logout']);
    //trang AddCategory 
    Route::get('addcategory', [CategoryController::class, 'setAddCategory']);
    Route::post('addcategory',[CategoryController::class,'addProductCategory'])->name('addcategory');
    //trang addproducttype
    Route::get('addproducttype', [ProductTypeController::class, 'setType']);
    Route::post('addtype',[ProductTypeController::class,'addProductType'])->name('addtype');
    // trang product
    Route::get('addproduct', [CategoryController::class, 'setAddProduct']);
    Route::post('addproduct',[ProductController::class,'addProduct'])->name('themsanpham');
    Route::get('products',[ProductController::class,'getProduct']);
    Route::get('logout',[AdminLoginController::class, 'logout']);
    Route::get('deleteproduct/{masp}',[ProductController::class,'deleteProduct'])->name('deleteproduct');
    // trang edit 
    Route::get('/editproduct/{masp}', [ProductController::class,'editProduct'])->name('editProduct');
    Route::post('/updateproduct',[ProductController::class,'updateProduct'])->name('updateproduct');
});
