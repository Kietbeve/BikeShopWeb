@extends('admin.home.admin')
@section('title', 'Thêm Sản Phẩm')
@section('content')

<h1 class="page-header">Thêm Sản Phẩm Mới</h1>
    
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white rounded-top">
                    <div class="card-body border rounded-lg p-3 border bg-white shadow-sm">
                        <form action="/admin/products/add" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <!-- Ảnh sản phẩm  -->
                            <div class="form-group col-md-6">
                            <label for="image">Ảnh sản phẩm</label>
                            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                            <img id="preview" class="img-thumbnail d-none product-img rounded" src="#" alt="Preview">
                            </div>

                            <!-- Mã sản phẩm -->
                            <div class="form-group col-md-6">
                            <label for="productCode">Mã sản phẩm</label>
                            <input type="text" class="form-control" id="productCode" name="product_code" placeholder="Nhập mã sản phẩm" list="productCodes" required>
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
                            <input type="text" class="form-control" id="productName" name="product_name" placeholder="Nhập tên sản phẩm" list="productNames" required>
                            <datalist id="productNames">
                                <option value="Xe đạp thể thao">
                                <option value="Bộ sạc điện thoại">
                                <option value="Mũ bảo hiểm">
                            </datalist>
                            </div>

                            <!-- Loại sản phẩm -->
                            <div class="form-group col-md-4">
                            <label for="productType">Loại sản phẩm</label>
                            <select class="form-control" id="productType" name="type" required>
                                <option value="">-- Chọn loại sản phẩm --</option>
                                <option value="Xe đạp">Xe đạp</option>
                                <option value="Phụ tùng">Phụ tùng</option>
                                <option value="Phụ kiện">Phụ kiện</option>
                                <option value="Bổ sung">Bổ sung</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Số lượng -->
                            <div class="form-group col-md-4">
                            <label for="quantity">Số lượng</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng" required>
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
                            <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá bán" required>
                            </div>
                        </div>

                        <div class="form-row">

                            <!-- Mã nhà sản xuất -->
                            <div class="form-group col-md-4">
                            <label for="manufacturerCode">Mã nhà sản xuất</label>
                            <input type="text" class="form-control" id="manufacturerCode" name="manufacturer_code" placeholder="Nhập mã nhà sản xuất" list="manufacturerCodes">
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
                            <input type="text" class="form-control" id="categoryCode" name="category_code" placeholder="Nhập mã danh mục" list="categoryList">
                            <datalist id="categoryList">
                                <option value="PK01">
                                <option value="PK02">
                                <option value="XD01">
                                <option value="XD02">
                            </datalist>
                            </div>


                        <!-- Mô tả -->
                        <div class="form-group">
                            <div class="form-group col-md-12"><label for="description">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
                        </div>

                        <!-- Trạng thái -->
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="status" name="status" checked>
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