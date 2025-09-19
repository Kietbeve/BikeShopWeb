<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
   return view('welcome');
});

//Route::get('/Test', [TestController::class, 'index']);

Route::get('/Test', function () {
   return view('Test/page', ['name' => 'Day la trang page', 'noidung' => 'gi do di']);
});