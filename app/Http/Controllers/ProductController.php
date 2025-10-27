<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    // phần Product 
    // hàm hiện thị tất cả sản phẩm
    public function getProduct() {
        $product = Product::all(); // lấy tất cả sản phẩm trong bảng sanpham
        return view('admin.pages.category', compact('product'));
    }
    
    // kiểm tra ma danh muc
    public function checkProductCategory($madm){
        //$check = DB::select("SELECT * FROM danhmucsanpham WHERE madm = ?", [$product->madm]);
        $check = Product::where('madm', $madm)->exists(); 
        if($check){
            return true;
         }
         return false;        
    }
    // kiểm tra masp có tồn tại
    public function checkProduct($masp){
        //$check_sp = DB::select("SELECT masp FROM sanpham WHERE masp = ?", [$product->masp]);
        $check_sp = Product::where('masp', $masp)->exists();
        if($check_sp){
            return true;
        }
        return false;
    }
    // Kiểm tra dữ liệu nhập vào của form addproduct
    public function checkInputProduct(Request $request){
        $validated = $request->validate([
            'anh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'masp' => 'required|string|max:50',
            'tensp' => 'required|string|max:255',
            'madm' => 'required|string|max:50',
            'mansx' => 'required|string|max:50',
            'soluong' => 'required|integer|min:0',
            'size' => 'required|string|max:20',
            'giaban' => 'required|numeric|min:0',
            'mota' => 'nullable|string|max:1000',
            'trangthai' => 'required|string|max:50',
            'tags' => 'required|string|max:255',
        ]);
        return  $validated;
    }

// Cập nhật hàm thêm sản phẩm 23/10/2025
    // hàm dùng để thêm sản phẩm 
    function addProduct(Request $request) {  
        try{
            checkInput($request);
        } catch(ValidationException $e){
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        }
        $extension = $request->file('anh')->getClientOriginalExtension(); // lấy phần mở rộng của file   
        $fileName = Str::slug($request->input('masp')).'-'.time(). '.' . $extension;//phần slug dùng để tạo 1 tên ảnh theo masp và danh muc
        $request->file('anh')->move(public_path('images'), $fileName);// move() or store: dùng để lưu ảnh vào thư mục ở đây move sẽ lưu ảnh vào thư mục public/images với tên như filename đã tạo phái trên
        $product = [
                'anh' => $fileName,
                'masp' => $request->input('masp'),
                'tensp' => $request->input('tensp'),
                'madm' => $request->input('madm'),
                'mansx' => $request->input('mansx'),
                'soluong' => $request->input('soluong'),
                'size' => $request->input('size'),
                'giaban' => $request->input('giaban'),
                'mota' => $request->input('mota'),
                'trangthai' => $request->input('trangthai'),
                'tags' => $request->input('tags')
            ]; 
        if(checkProduct($product['masp'])){
            return redirect()->with('message', 'Sản phẩm đã tồn tại!');
        }
        if(checkProductCategory($product['madm'])){ 
            //DB:: statement("INSERT INTO sanpham ( anh, masp, tensp, madm, mansx, soluong, size, giaban, mota, trangthai, tags) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$product->anh, $product->masp, $product->tensp, $product->madm, $product->mansx, $product->soluong, $product->size, $product->giaban, $product->mota, $product->trangthai, $product->tags]);
            //DB::table('sanpham')->insert($product);
            Product::create($product);
            return redirect('/')->with('success', 'Sản phẩm mới đã được thêm thành công!');
        }
        //return response()->json("can them");    
        return view('customer.adddanhmuc');    
    }
}
