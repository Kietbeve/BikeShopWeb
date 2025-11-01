<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;


class CategoryController extends Controller
{
    // kiểm tra dữ liệu nhập vào của trang addcategory
    public function checkInputCategory(Request $request){
         $validated = $request->validate([
            'madm' => 'required|string|max:50',
            'tendm' => 'required|string|max:255',
            'malsp' => 'required|string|max:50'
        ]);
        return  $validated;
    }
    //hàm lấy dữ liệu của danh mục
    public function getCategory(){
        $danhmuc = ProductCategory::getAllCategory();
        return $danhmuc;    
    }

    public function setAddProduct(){
        $danhmuc = $this->getCategory();
        return view('admin.pages.addproduct', compact('danhmuc'));    
    }

    public function setAddCategory(){
        $danhmuc = $this->getCategory();
        $lsp = ProductType::getAllType();
        return view('admin.pages.addcategory', compact('danhmuc', 'lsp'));    
    }

    // hàm thêm danh muc mới
    public function addProductCategory(Request $request){
        //  try{
        //     checkInput($request);
        // } catch(ValidationException $e){
        //     return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        // }
        $danhmuc = [
            'madm' => null,
            'malsp' => $request->input('malsp'),
            'tendm' => $request->input('tendm')   
        ];    

        if(ProductCategory::checkCategory($danhmuc['madm']) && ProductCategory::checkNameCategory($danhmuc['tendm'])){
            return redirect()->back()->with('message', 'Mã danh mục này đã tồn tại!');
        }

        if(ProductType::checkType($danhmuc['malsp'])){
            $danhmuc['madm'] =  ProductCategory::MadmAuto($request->input('malsp'));
            ProductCategory::addNewCategory($danhmuc);
            //return response()->json([$danhmuc->madm, $danhmuc->tendm]);
            return redirect('admin/addproduct')->with('success', 'Danh mục mới đã được thêm thành công!');
        }
        return redirect('/admin/addproducttype')->with('message', 'Loại sản phẩm không tồn tại này đã tồn tại');
    }    
}
