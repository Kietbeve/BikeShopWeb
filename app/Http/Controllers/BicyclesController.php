<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class BicyclesController extends Controller
{
    public function bicycles (){
       $products = Product::getByLoai(1);
        //return response()->json($products);
    }

    public function mountainBicycles(){
        $products = Product::getByMadm('XD02');

    }

    public function roadBicycles(){
        $products = Product::getByMadm('XD01');
    }

    public function sportsBicycles(){
        $products = Product::getByMadm('XD03');
    }

    public function racingBicycles(){
        $products = Product::getByMadm('XD04');
    }
}
