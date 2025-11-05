<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use App\Models\Manufacturer;


class ProductController extends Controller
{
    // phần Product 
    // hàm hiện thị tất cả sản phẩm
    public function getProduct() {
        $product = Product::getAllProducts(); // lấy tất cả sản phẩm trong bảng sanpham
        return view('admin.pages.category', compact('product'));
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

    // hàm dùng để thêm sản phẩm 
    public function addProduct(Request $request) {  
        // try{
        //     checkInput($request);
        // } catch(ValidationException $e){
        //     return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        // }
        if($request->hasFile('anh') && $request->file('anh')->isValid()) {
            $img_goc = $request->file('anh')->getClientOriginalName();
            if(!file_exists(public_path('userAsset/images/'.$img_goc))) {
                $extension = $request->file('anh')->getClientOriginalExtension(); // lấy phần mở rộng của file   
                $fileName = Str::slug($request->input('masp')).'-'.time(). '.' . $extension;//phần slug dùng để tạo 1 tên ảnh theo masp và danh muc
                $request->file('anh')->move(public_path('userAsset/images'), $fileName);// move() or store: dùng để lưu ảnh vào thư mục ở đây move sẽ lưu ảnh vào thư mục public/images với tên như filename đã tạo phái trên
            }
            else {
                $fileName = $img_goc;
            }
        }   
        else {
            $fileName = "noimg.jpg";
        }     
        $product = [
                'anh' => $fileName,
                'masp' => Product::productAuto(),
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
            //return response()->json($product);  
        if(Product::checkProduct($product['masp'])){
            return redirect()->with('message', 'Sản phẩm đã tồn tại!');
        }
        if(ProductCategory::checkCategory($product['madm'])){ 
            //DB:: statement("INSERT INTO sanpham ( anh, masp, tensp, madm, mansx, soluong, size, giaban, mota, trangthai, tags) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$product->anh, $product->masp, $product->tensp, $product->madm, $product->mansx, $product->soluong, $product->size, $product->giaban, $product->mota, $product->trangthai, $product->tags]);
            //DB::table('sanpham')->insert($product);
            Product::addNewProduct($product);
            return redirect('/')->with('message', 'Sản phẩm mới đã được thêm thành công!');
        }
        //return response()->json("can them");    
        return view('admin.pages.addproduct');    
    }

    function deleteProduct($masp) {
        Product::deleteProduct($masp);                
        //return view('customer.product', compact('products'));
        return redirect('admin/products')->with('message', 'Sản phẩm mới đã được xóa thành công!');
    }

    function editProduct($masp){
        $product = Product::editProduct($masp);
        $danhmuc = ProductCategory::getAllCategory();
        $nsx = Manufacturer::getAllManufacturer();
        return view('admin.pages.editproduct', compact('product', 'danhmuc', 'nsx'));
    }

    function updateProduct(Request $request) {
        if($request->hasFile('anh') && $request->file('anh')->isValid()) {
            $img_goc = $request->file('anh')->getClientOriginalName();
            if(!file_exists(public_path('userAsset/images/'.$img_goc))) {
                $extension = $request->file('anh')->getClientOriginalExtension(); // lấy phần mở rộng của file   
                $fileName = Str::slug($request->input('masp')).'-'.time(). '.' . $extension;//phần slug dùng để tạo 1 tên ảnh theo masp và danh muc
                $request->file('anh')->move(public_path('userAsset/images'), $fileName);// move() or store: dùng để lưu ảnh vào thư mục ở đây move sẽ lưu ảnh vào thư mục public/images với tên như filename đã tạo phái trên
            }
            else {
                $fileName = $img_goc;
            }
        }   
        else {
            $fileName = $request->input('anh_cu');
        } 
        $data = [
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
        Product::updateProduct($data['masp'], $data);
        return redirect('admin/products')->with('message','Sản phẩm được sửa thành công');
    }    
}
