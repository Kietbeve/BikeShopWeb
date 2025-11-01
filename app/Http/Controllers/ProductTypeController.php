<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    // kiểm tra dữ liệu nhập vào của trang addcategory
    public function checkInputProductType(Request $request){
         $validated = $request->validate([
            'malsp' => 'required|string|max:50',
            'tenlsp' => 'required|string|max:255',
        ]);
        return  $validated;
    }
    //hàm lấy dữ liệu của danh mục
    public function getType(){
        $lsp = ProductType::getAllType();
        return $lsp;    
    }

    public function setType(){
        $lsp = $this->getType();
        return view('admin.pages.addproducttype', compact('lsp'));   
    }

    // hàm thêm danh muc mới
    public function addProductType(Request $request){
        //  try{
        //     checkInput($request);
        // } catch(ValidationException $e){
        //     return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        // }
        $lsp = [
            'tenlsp' => $request->input('tendm')   
        ];    
        if(ProductType::checkNameType($lsp['tenlsp'])){            
            return redirect()->with('message', 'Loại sản phẩm đã tồn tại');
        }
        Product::addNewType($lsp);
        return redirect('admin/addcategory')->with('message', 'Thêm loại sản phẩm thành công!');
    } 
}
