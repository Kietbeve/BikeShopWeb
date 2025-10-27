@extends('admin.home.admin')
@section('title', 'Thêm Sản Phẩm')
@section('content')

<h1 class="page-header">Thêm Sản Phẩm Mới</h1>

{{-- gợi ý hàm: 
    có thể dùng foreach để lấy ra tên danh mục nhưng giá trị phải gắn = madm phải gán lại value cho tui
--}}
    
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white rounded-top">
                    <div class="card-body border rounded-lg p-3 border bg-white shadow-sm">
                        <form action="themsanpham" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-row">
                            <!-- Ảnh sản phẩm  -->
                            <div class="form-group col-md-6">
                                <label for="anh">Ảnh sản phẩm</label>
                                <input type="file" name="anh" required="">
                                {{-- <img src="{{asset("/images/noimg.jpg")}}" class="img-fluid" id="pre-img-1" > --}}
                            </div>

                            <!-- Mã sản phẩm -->
                            <div class="form-group col-md-6">
                            <label for="productCode">Mã sản phẩm</label>
                            <input type="text" class="form-control" id="masp" name="masp" placeholder="Nhập mã sản phẩm" list="productCodes" required>
                            <datalist id="productCodes">
                                <!-- Ví dụ gợi ý từ CSDL -->
                                <option value="SP001">
                                <option value="SP002">
                                <option value="SP003">
                            </datalist>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Tên sản phẩm -->
                            <div class="form-group col-md-6">
                            <label for="productName">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="tensp" name="tensp" placeholder="Nhập tên sản phẩm" list="productNames" required>
                            <datalist id="productNames">
                                <option value="Xe đạp thể thao">
                                <option value="Bộ sạc điện thoại">
                                <option value="Mũ bảo hiểm">
                            </datalist>
                            </div>

                            {{-- <!-- Loại sản phẩm -->
                            <div class="form-group col-md-4">
                            <label for="productType">Loại sản phẩm</label>
                            <select class="form-control" id="productType" name="type" required>
                                <option value="">-- Chọn loại sản phẩm --</option>
                                <option value="Xe đạp">Xe đạp</option>
                                <option value="Phụ tùng">Phụ tùng</option>
                                <option value="Phụ kiện">Phụ kiện</option>
                                <option value="Bổ sung">Bổ sung</option>
                            </select>
                            </div> --}}
                        </div>

                        <div class="form-row">
                            <!-- Số lượng -->
                            <div class="form-group col-md-4">
                            <label for="quantity">Số lượng</label>
                            <input type="number" class="form-control" id="soluong" name="soluong" placeholder="Nhập số lượng" required>
                            </div>

                            <!-- Size -->
                            <div class="form-group col-md-4">
                            <label for="size">Size</label>
                            <input type="text" class="form-control" id="size" name="size" placeholder="Nhập size" list="sizes">
                            <datalist id="sizes">
                                <option value="S">
                                <option value="M">
                                <option value="L">
                                <option value="XL">
                            </datalist>
                            </div>

                            <!-- Giá-->
                            <div class="form-group col-md-4">
                            <label for="price">Giá bán (VNĐ)</label>
                            <input type="number" class="form-control" id="giaban" name="giaban" placeholder="Nhập giá bán" required>
                            </div>
                        </div>

                        <div class="form-row">

                            <!-- Mã nhà sản xuất -->
                            <div class="form-group col-md-4">
                            <label for="manufacturerCode">Mã nhà sản xuất</label>
                            <input type="text" class="form-control" id="mansx" name="mansx" placeholder="Nhập mã nhà sản xuất" list="manufacturerCodes">
                            <datalist id="manufacturerCodes">
                                <option value="1">
                                <option value="2">
                                <option value="3">
                                <option value="4">
                            </datalist>
                            </div>
                            
                        <!-- Mã danh mục -->
                        
                            
                        
                        <div class="form-group col-md-4">
                            <label for="categoryCode">Mã danh mục</label>
                            <input type="text" class="form-control" id="madm" name="madm" placeholder="Nhập mã danh mục" list="categoryList">
                            <datalist id="categoryList">                        
                            @foreach ($danhmuc as $dm)
                                <option value="{{ $dm->madm }}">{{ $dm->tendm }}</option>
                            @endforeach
                        </select>
                            </datalist>
                        </div>


                        <!-- Mô tả -->
                        <div class="form-group">
                            <div class="form-group col-md-12"><label for="description">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="mota" name="mota" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
                        </div>

                        {{-- tags --}}
                        <div class="form-group col-md-4">
                            <label for="manufacturerCode">tags</label>
                            <input type="text" class="form-control" id="tags" name="tags" placeholder="Nhập mã nhà sản xuất" list="manufacturerCodes">
                        </div>

                        <!-- Trạng thái -->
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                {{-- <input type="text" class="custom-control-input" id="name" name="trangthai" value="1"> --}}
                                <label class="custom-control-label" for="status">Hiển thị sản phẩm</label>
                                </div>
                            </div>
                        </div>

                        <!-- Nút submit -->
                        <button type="submit" class="btn btn-success btn-block btn-lg shadow-sm rounded"> Thêm sản phẩm</button>
                        </form>
                 </div>
            </div>
        </div>
    </div>
</div>
    

  
@endsection