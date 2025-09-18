<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function home(){
        return view("customer.home");
    }

    // hàm xử lý request từ form (18/9/2025) 18/09/2025 kietbeve da doi ten test->singup va viet lai return
    function sign_up(Request $request){
        $name = $request->input('name'); 
        $email = $request->input('email');        
        return view("customer.contact",compact('name'));
      
    }
    
    function list(){
        return view("customer.list");
    }
       function detail(){
        return view("customer.detail");
    }
           function cart(){
        return view("customer.cart");
    }
}
