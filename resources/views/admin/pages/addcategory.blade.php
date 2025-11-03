@extends('admin.home.admin')
@section('title', 'Thêm Danh Mục')
@section('content')

<h1 class="page-header">Thêm Danh Mục Mới</h1>   
            <div class="card shadow-sm">
                @if (session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
                <div class="card-header bg-primary text-white rounded-top">
                    <div class="card-body border rounded-lg p-3 border bg-white shadow-sm">
                        <form action="/admin/addcategory" method="POST" enctype="multipart/form-data">
                            @csrf                       
                        <div class="form-row">
                            <!-- Tên sản phẩm -->
                            <div  class="form-group col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="tendm">Tên danh mục</label>
                                    <input type="text" class="form-control" id="tendm" name="tendm" placeholder="Nhập tên sản phẩm" list="nameCategory" required>
                                        <datalist id="nameCategory">
                                            @foreach ($danhmuc as $dm)
                                                <option>{{ $dm->tendm }}</option>
                                            @endforeach
                                        </datalist>
                                </div>
                            </div>
                            
                            
                            <!-- Loại sản phẩm -->
                            <div  class="form-group col-md-12">
                                <div class="form-group col-md-6 ">
                                    <label for="malsp">Loại sản phẩm</label>
                                    <input type="text" class="form-control" id="malsp" name="malsp" placeholder="Nhập tên sản phẩm" list="productType" required>
                                        <datalist id="productType">
                                            @foreach ($lsp as $i)
                                                <option value="{{ $i->malsp }}">{{ $i->tenlsp }}</option>
                                            @endforeach
                                        </datalist>
                                </div>
                            </div>
                            
                        </div>                      

                        <!-- Nút submit -->
                        <button type="submit" class="btn btn-success btn-block btn-lg shadow-sm rounded"> Thêm sản phẩm</button>
                        </form>
                    </div>
            </div>
@endsection