@extends('admin.home.admin')
@section('title', 'Thêm Loại Sản Phẩm')
@section('content')

<h1 class="page-header">Thêm Loại Sản Phẩm Mới</h1>

{{-- gợi ý hàm: 
    có thể dùng foreach để lấy ra tên danh mục nhưng giá trị phải gắn = madm phải gán lại value cho tui
--}}
    
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="container mt-5">
            <div class="card shadow-sm">
                @if (session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
                <div class="card-header bg-primary text-white rounded-top">
                    <div class="card-body border rounded-lg p-3 border bg-white shadow-sm">
                        <form action="addtype" method="POST" enctype="multipart/form-data">
                            @csrf      
                                              
                            <div class="form-row">
                                <!-- Tên loại sản phẩm -->
                                <div class="form-group col-md-6">
                                <label for="tenlsp">Tên loại sản phẩm</label>
                                <input type="text" class="form-control" id="tenlsp" name="tenlsp" placeholder="Nhập tên sản phẩm" list="typeNames" required>
                                <datalist id="typeNames">
                                    @foreach ($lsp as $i)
                                        <option>{{ $i->tenlsp }}</option>
                                    @endforeach
                                </datalist>
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