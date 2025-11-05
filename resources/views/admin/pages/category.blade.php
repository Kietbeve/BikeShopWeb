@extends('admin.home.admin')
@section('title', 'Danh Mục Sản Phẩm')
@section('content')



    <h1 class="page-header">Danh Sách Sản Phẩm</h1>
    @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif
    <!-- Bảng sản phẩm -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Mã danh mục</th>
                <th>Mã NSX</th>
                <th>Số lượng</th>
                <th>Size</th>
                <th>Mô tả</th>
                <th>Giá bán</th>
                <th>Tags</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $i)
            <tr>
                <td><img src="{{ asset("/userAsset/images/". $i->anh )}}" class="img-thumbnail" style="max-height:60px;"></td>
                <td>{{ $i->masp }}</td>
                <td>{{ $i->tensp }}</td>
                <td>{{ $i->madm }}</td>
                <td>{{ $i->mansx }}</td>
                <td>{{ $i->soluong }}</td>
                <td>{{ $i->size }}</td>
                <td>{{ $i->mota }}</td>
                <td>{{ $i->giaban }}</td>
                <td>{{ $i->tags }}</td>
                <td>
                    @if($i->trangthai)
                        <span class="badge badge-primary rounded-pill">Đang bán</span>
                        @else
                        <span class="badge badge-danger rounded-pill">Dừng bán</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('editProduct', ['masp' => $i->masp]) }}">Sửa</a>
                    <a href="{{ route('deleteproduct', ['masp' => $i->masp]) }}">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection