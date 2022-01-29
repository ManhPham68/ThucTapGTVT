<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection

@section('content')

    <div class="content-fluid" style="margin: 10px" >

        @include('admins.partials.content-header',['name'=>'DS Nhân Viên','key'=>'Danh Sách'])
        @can('user-add')
            <a href="{{route('users.themmoi')}}" class="btn btn-success" style="margin-bottom: 10px">Thêm Mới Nhân Viên</a>
        @endcan

       {{-- @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif--}}
        <div class="card shadow mb-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">Tên Nhân Viên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Hoạt Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $Item )
                            <tr>
                                <td>{{$Item->name}}</td>
                                <td>{{$Item->email}}</td>
                                <td><img src="{{$Item->image_path}}" style="height:100px;object-fit: cover"></td>
                                <td>

                                        @can('user-update')
                                    <a href="{{route('users.sua',['id'=>$Item->id])}}" class="btn btn-warning">Sửa</a>
                                        @endcan
                                    @method('DELETE')
                                        @can('user-delete')

                                    <a href="" data-url ="{{route('users.xoa',['id'=>$Item->id])}}" class="btn btn-danger " id="xoa">Xóa</a>
                                        @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{--</div>--}}
        </div>

    </div>
@section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset("content/js/list.js")}}"></script>
@endsection

@endsection
