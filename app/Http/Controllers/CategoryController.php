<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
    // phần category 
    // kiểm tra dữ liệu nhập vào của trang addcategory
    public function checkInputCategory(Request $request){
         $validated = $request->validate([
            'madm' => 'required|string|max:50',
            'tendm' => 'required|string|max:255',
            'malsp' => 'required|string|max:50'
        ]);
        return  $validated;
    }
    // hàm kiểm tra danh muc có tồn tại
    public function checkCategory($madm){
        $check_dm = ProductCategory::where('madm', $madm)->exists();
    }

    //hàm lấy dữ liệu của danh mục
    public function getCategory(){
         $danhmuc = ProductCategory::all();

    }

    // hàm thêm danh muc mới
    public function addProductCategory(Request $request){
         try{
            checkInput($request);
        } catch(ValidationException $e){
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        }
        $danhmuc = [
            'madm' => $request->input('madm'),
            'malsp' => $request->input('malsp'),
            'tendm' => $request->input('tendm')   
        ];    

        if(checkCategory($danhmuc['madm'])){
            return redirect()->back()->with('message', 'Mã danh mục này đã tồn tại');
        }
        //DB::statement("INSERT INTO danhmucsanpham ( madm, malsp, tendm ) VALUES (?,?,?)",[$danhmuc->madm, $danhmuc->malsp, $danhmuc->tendm]);
        //DB::table('danhmucsanpham')->insert($danhmuc);
        Product::create($danhmuc);
        //return response()->json([$danhmuc->madm, $danhmuc->tendm]);
        return redirect('/addproduct')->with('success', 'Sản phẩm mới đã được thêm thành công!');
    }    
}
