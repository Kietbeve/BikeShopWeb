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

    public function bicycles (){
       $products = Product::with('danhmuc')
                   ->whereHas('danhmuc', function ($query) {
                       $query->where('malsp', 1);
                   })
                   ->select('madm')->get();

        //return response()->json($products);
    }

    public function parts (){
       $products = Product::with('danhmuc')
                   ->whereHas('danhmuc', function ($query) {
                       $query->where('malsp', 2);
                   })
                   ->select('madm')->get();

        //return response()->json($products);
    }

    public function accessories (){
       $products = Product::with('danhmuc')
                   ->whereHas('danhmuc', function ($query) {
                       $query->where('malsp', 3);
                   })
                   ->select('madm')->get();

        //return response()->json($products);
    }

    public function mountainBicycles(){
        $products = Product::where('madm', 'XD02')
                            ->select('madm')->get();
    }

    public function roadBicycles(){
        $products = Product::where('madm', 'XD01')
                            ->select('madm')->get();
    }

    public function sportsBicycles(){
        $products = Product::where('madm', 'XD03')
                            ->select('madm')->get();
    }

    public function racingBicycles(){
        $products = Product::where('madm', 'XD04')
                            ->select('madm')->get();
    }

//.... còn tiếp

}
?>