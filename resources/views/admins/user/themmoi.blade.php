<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/user/add/add.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-fluid" style="margin: 10px">
        @include('admins.partials.content-header',['name'=>'Nhân Viên','key'=>'Thêm Mới'])
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-6">

                        <form action="{{route('users.themmoi_gui')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên Nhân Viên</label>
                                <input type="text" class="form-control" name="name"
                                       placeholder=" Nhập Tên Nhân Viên" value="{{old('name')}}">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email"
                                       placeholder=" Nhập Email" value="{{old('email')}}">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password"
                                       placeholder=" Nhập Password">
                                <label>Ảnh Nhân Viên</label>
                                <input type="file" class="form-control-file" name="image"
                                       placeholder="Ảnh Quảng Cáo">
                                <label>Chọn vai trò</label>
                                <select class="form-control" id="selec2_init" name="role_id[]" multiple>
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach

                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary">Thêm Mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="{{asset("vendor/select2/select2.min.js")}}"></script>
    <script src="{{asset("vendor/user/add/add.js")}}"></script>
@endsection
@endsection

