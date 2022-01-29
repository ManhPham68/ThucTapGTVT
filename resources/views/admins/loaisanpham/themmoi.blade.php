<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('content')
    <div class="content-fluid" style="margin: 10px">
        @include('admins.partials.content-header',['name'=>'Loại sản phẩm','key'=>'Thêm Mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-6">

                        <form action="{{route('loaisanphams.themmoi_gui')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên Loại Sản Phẩm</label>
                                <input type="text" class="form-control" name='ten_loaisp' id=""
                                       placeholder=" Nhập Tên Loại Sản Phẩm">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm Mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

