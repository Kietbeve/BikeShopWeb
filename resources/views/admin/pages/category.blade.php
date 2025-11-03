@extends('admin.home.admin')
@section('title', 'Danh Mục Sản Phẩm')
@section('content')

<h1 class="page-header">Danh Sách Sản Phẩm</h1>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $product)
                        <tr>
                            <td><img src="{{ $product->image ?? 'https://via.placeholder.com/60' }}" 
                                class="img-thumbnail" style="max-height:60px;"></td>
                            <td>{{ $product->masp }}</td>
                            <td>{{ $product->tensp }}</td>
                            <td>{{ $product->madm }}</td>
                            <td>{{ $product->mansx }}</td>
                            <td>{{ $product->soluong }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->mota }}</td>
                            <td>{{ $product->giaban }}</td>
                            <td>{{ $product->tags }}</td>
                            <td>
                                @if($product->trangthai)
                                    <span class="badge badge-primary rounded-pill">Đang bán</span>
                                    @else
                                    <span class="badge badge-danger rounded-pill">Dừng bán</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
@endsection