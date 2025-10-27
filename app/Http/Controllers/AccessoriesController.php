<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class AccessoriesController extends Controller
{
    public function accessories (){
       $products = Product::getByLoai(3);

        //return response()->json($products);
    }

    public function bicycleFlashlight(){
        $products = Product::getByMadm('PK01');
    }

    public function bicycleKickstand(){
        $products = Product::getByMadm('PK02');
    }

    public function bicycleHandlebarBag(){
        $products = Product::getByMadm('PK03');
    }

    public function otherAccessories(){
        $products = Product::getByMadm('PK04');
    }
}
