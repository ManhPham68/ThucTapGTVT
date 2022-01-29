<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('content')
    <div class="content-fluid" style="margin: 10px">
        @include('admins.partials.content-header',['name'=>'Ảnh Quảng Cáo','key'=>'Thêm Mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-6">

                        <form action="{{route('sliders.themmoi_gui')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên Ảnh Quảng Cáo</label>
                                <input type="text" class="form-control" name="name"
                                       placeholder=" Nhập Tên Ảnh Quảng Cáo">
                                <label>Thông Tin</label>
                                <textarea type="text" class="form-control" name="des"
                                       placeholder=" Thông Tin">
                                </textarea>
                                <label>Ảnh Quảng Cáo</label>
                                <input type="file" class="form-control-file"name="image"
                                       placeholder="Ảnh Quảng Cáo">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm Mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

