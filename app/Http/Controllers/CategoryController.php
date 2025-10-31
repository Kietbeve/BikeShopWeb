<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
<<<<<<< HEAD
use App\Models\Manufacturer;
=======
use App\Models\ProductType;

>>>>>>> 881b5990312d0c1fd7ede696649987c4ca7e182c
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
        $nsx = Manufacturer::getAllManufacturer();
        return view('admin.pages.addproduct', compact('danhmuc','nsx'));    
    }

    // hàm thêm danh muc mới
    public function addProductCategory(Request $request){
        //  try{
        //     checkInput($request);
        // } catch(ValidationException $e){
        //     return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        // }
        $madm = 
        $danhmuc = [
            'madm' => ProductCategory::MadmAuto($request->input('malsp')),
            'malsp' => $request->input('malsp'),
            'tendm' => $request->input('tendm')   
        ];    

        if(ProductCategory::checkCategory($danhmuc['madm'])){
            return redirect()->back()->with('message', 'Mã danh mục này đã tồn tại');
        }

        if(ProductType::checkType($danhmuc['malsp'])){
            //DB::statement("INSERT INTO danhmucsanpham ( madm, malsp, tendm ) VALUES (?,?,?)",[$danhmuc->madm, $danhmuc->malsp, $danhmuc->tendm]);
            //DB::table('danhmucsanpham')->insert($danhmuc);
            ProductCategory::addNewCategory($danhmuc);
            //return response()->json([$danhmuc->madm, $danhmuc->tendm]);
            return redirect('/addproduct')->with('success', 'Sản phẩm mới đã được thêm thành công!');
        }
        return redirect()->with('message', 'Loại sản phẩm không tồn tại này đã tồn tại');
    }    
}
