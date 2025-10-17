@extends('admin.home.admin')
@section('title', 'Danh Muc San Pham')
@section('content')

<h1 class="page-header">Danh Sách Sản Phẩm</h1>
    <!-- Bảng sản phẩm -->
        <div class="container table-wrapper">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                        <th>Ảnh</th>
                        <th>Mã SP</th>
                        <th>Tên SP</th>
                        <th>Loại SP</th>
                        <th>Số lượng</th>
                        <th>Size</th>
                        <th>Mô tả</th>
                        <th>Giá bán</th>
                        <th>Mã NSX</th>
                        <th>Mã Admin</th>
                        <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu mẫu -->
                        <!-- Thêm các dòng sản phẩm khác bằng cách dùng foreach -->
                        <tr>
                        <td><img src="https://via.placeholder.com/60" class="product-img" alt="Xe đạp"></td>
                        <td>XD01</td>
                        <td>Xe đạp thể thao</td>
                        <td>Xe đạp</td>
                        <td>10</td>
                        <td>L</td>
                        <td>Xe đạp chất lượng cao, khung nhôm</td>
                        <td>5,000,000</td>
                        <td>NSX001</td>
                        <td>ADM001</td>
                        <td><span class="badge badge-active">Hiển thị</span></td>
                        </tr>
                        
                    </tbody>
                    </table>
                </div>
            </div>
@endsection