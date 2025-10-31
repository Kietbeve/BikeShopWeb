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

                            <!-- Mã sản phẩm -->
                            <div class="form-group col-md-6">
                            <label for="productCode">Mã danh mục</label>
                            <input type="text" class="form-control" id="madm" name="madm" placeholder="Nhập mã sản phẩm" list="productCodes" required>
                            <datalist id="productCodes">
                                 @foreach ($danhmuc as $dm)
                                    <option>{{ $dm->madm }}</option>
                                @endforeach
                            </datalist>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Tên sản phẩm -->
                            <div class="form-group col-md-6">
                            <label for="productName">Tên danh mục</label>
                            <input type="text" class="form-control" id="tendm" name="tendm" placeholder="Nhập tên sản phẩm" list="productNames" required>
                            <datalist id="productNames">
                                 @foreach ($danhmuc as $dm)
                                    <option>{{ $dm->tendm }}</option>
                                @endforeach
                            </datalist>
                            </div>

                            <!-- Loại sản phẩm -->
                            <div class="form-group col-md-4">
                            <label for="productType">Loại sản phẩm</label>
                            <select class="form-control" id="productType" name="type" required>
                                
                            </select>
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