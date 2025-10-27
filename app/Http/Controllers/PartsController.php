<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class PartsController extends Controller
{
    public function parts (){
       $products = Product::getByLoai(2);

        //return response()->json($products);
    }


    public function bicycleTire(){
        $products = Product::getByMadm('PT01');
    }

    public function bicycleGear(){
        $products = Product::getByMadm('PT02');
    }

    public function bicycleInnerTube(){
        $products = Product::getByMadm('PT03');
    }

    public function otherParts(){
        $products = Product::getByMadm('PT04');
    }
}
