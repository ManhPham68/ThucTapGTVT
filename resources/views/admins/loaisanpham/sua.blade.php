<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('content')
    <div class="content-fluid" style="margin: 10px">
        @include('admins.partials.content-header',['name'=>'Loại sản phẩm','key'=>'Sửa'])
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-6">

                        <form action="{{route('loaisanphams.sua_gui',['id'=>$loai_sp->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên Loại Sản Phẩm</label>
                                <input type="text" class="form-control" name='ten_loaisp' id="" value="{{$loai_sp->ten_loaisp}}"
                                       placeholder=" Nhập Tên Loại Sản Phẩm">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

