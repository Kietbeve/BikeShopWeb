<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    // Hiển thị trang chủ với 3 sản phẩm
    function index(){
        $products = Product::take(6)->get(); // Lấy 6 sản phẩm đầu tiên
        //return response()->json($products);

        //truyen 6 xe dap vao view
        return view('userViews/pages/home', compact('products'));
    }       
   

}
?>