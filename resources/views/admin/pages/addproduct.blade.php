@extends('admin.home.admin')
@section('title', 'Thêm Sản Phẩm')
@section('content')

<h1 class="page-header">Thêm Sản Phẩm Mới</h1>    
            <div class="card shadow-sm">
                @if (session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
                <div class="card-header bg-primary text-white rounded-top">
                    <div class="card-body border rounded-lg p-3 border bg-white shadow-sm">
                        <form action="/admin/addproduct" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-row">
                            <!-- Ảnh sản phẩm  -->
                            <div class="form-group col-md-12">
                                <label for="anh">Ảnh sản phẩm</label>
                                <input type="file" name="anh" required="">
                                <img src="{{asset("/images/noimg.jpg")}}" class="img-fluid" id="pre-img-1" >
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Tên sản phẩm -->
                            <div class="form-group col-md-4">
                            <label for="productName">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="tensp" name="tensp" placeholder="Nhập tên sản phẩm" list="productNames" required>
                            </div>

                            <div class="form-group col-md-4">
                            <label for="categoryCode">Tên danh mục</label>
                            <input type="text" class="form-control" id="madm" name="madm" placeholder="Nhập mã danh mục" list="categoryList">
                            <datalist id="categoryList">                        
                                @foreach ($danhmuc as $dm)
                                    <option value="{{ $dm->madm }}">{{ $dm->tendm }}></option>
                                @endforeach
                            </datalist>
                            </div>
                            <!-- Tên nhà sản xuất -->
                            <div class="form-group col-md-4">
                            <label for="manufacturerCode">Tên nhà sản xuất</label>
                            <input type="text" class="form-control" id="mansx" name="mansx" placeholder="Nhập mã nhà sản xuất" list="manufacturerCodes">
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
                            <input type="number" class="form-control" id="soluong" name="soluong" placeholder="Nhập số lượng"  min="0" step="1" required>
                            </div>

                            <!-- Size -->
                            <div class="form-group col-md-4">
                            <label for="size">Size</label>
                            <input type="text" class="form-control" id="size" name="size" placeholder="Nhập size" list="sizes" required>
                            </div>

                            <!-- Giá-->
                            <div class="form-group col-md-4">
                            <label for="price">Giá bán (VNĐ)</label>
                            <input type="number" class="form-control" id="giaban" name="giaban" placeholder="Nhập giá bán" min="0" step="10000" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Mô tả sản phẩm -->
                            <div class="form-group">
                                <div class="form-group col-md-12"><label for="description">Mô tả sản phẩm</label>
                                <textarea class="form-control" id="mota" name="mota" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            {{-- tags --}}
                            <div class="form-group col-md-4">
                                <label for="manufacturerCode">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="Nhập Tags">
                            </div>

                        <!-- Trạng thái -->
                        <div class="form-group col-md-12">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="trangthai" name="trangthai" value="1" checked>
                                <label class="custom-control-label" for="trangthai">Hiển thị sản phẩm</label>
                            </div>
                        </div>
                        </div>
                        <!-- Nút submit -->
                        <button type="submit" class="btn btn-success btn-block btn-lg shadow-sm rounded"> Thêm sản phẩm</button>
                        </form>
                     </div>
            </div>
@endsection