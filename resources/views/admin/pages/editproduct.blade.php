@extends('admin.home.admin')
@section('title', 'Sửa Sản Phẩm')
@section('content')
    
    <h1 class="page-header">Sửa Sản Phẩm có ID: {{ $product->masp }}</h1>    
    <div class="card shadow-sm">
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif            
        <div class="card-header bg-primary text-white rounded-top">
            <div class="card-body border rounded-lg p-3 border bg-white shadow-sm">
                <form action="/admin/updateproduct" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-row">
                    <input type="hidden" name="masp" value="{{ $product->masp }}">
                    <!-- Ảnh sản phẩm  -->
                    <div class="form-group col-md-12">
                        <label for="anh">Ảnh sản phẩm</label>
                        <input type="hidden" name="anh_cu" value="{{ $product->anh }}">
                        <input type="file" name="anh" id="i-img-1">
                        <img src="{{asset("/userAsset/images/" . $product->anh )}}" class="img-fluid" id="pre-img-1" width="200px" style="margin-top: 5px">
                        <script>
                            var i_img1=document.getElementById('i-img-1')//input
                                i_img1.onchange = evt => {
                                    const [file] =  i_img1.files
                                    if (file) {
                                        document.getElementById('pre-img-1').src = URL.createObjectURL(file)//noi anh xuat hien
                                    }
                                }
                        </script>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Tên sản phẩm -->
                    <div class="form-group col-md-4">
                    <label for="productName">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="tensp" name="tensp" value="{{ $product->tensp }}" placeholder="Nhập tên sản phẩm" list="productNames" required>
                    </div>

                    <div class="form-group col-md-4">
                    <label for="categoryCode">Tên danh mục</label>
                    <input type="text" class="form-control" id="madm" name="madm" value="{{ $product->madm }}" placeholder="Nhập mã danh mục" list="categoryList">
                    <datalist id="categoryList">                        
                        @foreach ($danhmuc as $dm)
                            <option value="{{ $dm->madm }}">{{ $dm->tendm }}></option>
                        @endforeach
                    </datalist>
                    </div>
                    <!-- Tên nhà sản xuất -->
                    <div class="form-group col-md-4">
                    <label for="manufacturerCode">Tên nhà sản xuất</label>
                    <input type="text" class="form-control" id="mansx" name="mansx" value="{{ $product->mansx }}" placeholder="Nhập mã nhà sản xuất" list="manufacturerCodes">
                    <datalist id="manufacturerCodes">
                        @foreach ($nsx as $tennsx)
                            <option value="{{ $tennsx->mansx }}">{{ $tennsx->tennsx }}</option>
                        @endforeach
                    </datalist>
                    </div>
                </div>                           

                <div class="form-row">
                    <!-- Số lượng -->
                    <div class="form-group col-md-4">
                    <label for="quantity">Số lượng</label>
                    <input type="number" class="form-control" id="soluong" name="soluong" value="{{ $product->soluong }}" placeholder="Nhập số lượng"  min="0" step="1" required>
                    </div>

                    <!-- Size -->
                    <div class="form-group col-md-4">
                    <label for="size">Size</label>
                    <input type="text" class="form-control" id="size" name="size" value="{{ $product->size }}" placeholder="Nhập size" list="sizes" required>
                    </div>

                    <!-- Giá-->
                    <div class="form-group col-md-4">
                    <label for="price">Giá bán (VNĐ)</label>
                    <input type="number" class="form-control" id="giaban" name="giaban" value="{{ $product->giaban }}" placeholder="Nhập giá bán" min="0" step="10000" required>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Mô tả sản phẩm -->
                    <div class="form-group">
                        <div class="form-group col-md-12"><label for="description">Mô tả sản phẩm</label>
                        <textarea class="form-control" id="mota" name="mota" rows="4" placeholder="Nhập mô tả sản phẩm">{{ $product->mota }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    {{-- tags --}}
                    <div class="form-group col-md-4">
                        <label for="manufacturerCode">Tags</label>
                        <input type="text" class="form-control" id="tags" name="tags" value="{{ $product->tags }}" placeholder="Nhập Tags">
                    </div>

                <!-- Trạng thái -->
                <div class="form-group col-md-12">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="trangthai" name="trangthai" value="{{ $product->trangthai }}" checked>
                        <label class="custom-control-label" for="trangthai">Hiển thị sản phẩm</label>
                    </div>
                </div>
                </div>
                <!-- Nút submit -->
                <button type="submit" class="btn btn-success btn-block btn-lg shadow-sm rounded"> Sửa sản phẩm</button>
                </form>
                </div>
    </div>
@endsection