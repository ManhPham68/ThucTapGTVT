<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection

@section('content')

    <div class="content-fluid" style="margin: 10px">

        @include('admins.partials.content-header',['name'=>'Vai Trò Hệ Thống','key'=>'Danh Sách'])
        @can('role-add')
            <a href="{{route('roles.themmoi')}}" class="btn btn-success" style="margin-bottom: 10px">Thêm Vai Trò </a>
        @endcan

       {{-- @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif--}}
   {{--     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('roles.themmoi')}}" class="btn btn-success float-right m-2">Thêm Mới Vai Trò</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Tên Vai Trò</th>
                                <th scope="col">Mô Tả</th>

                                <th scope="col">Hoạt Động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $Item )
                                <tr>
                                    <td>{{$Item->name}}</td>
                                    <td>{{$Item->display_name}}</td>
                                    <td>
                                        <a href="{{route('roles.themmoi')}}" class="btn btn-success">Thêm </a>
                                        <a href="{{route('roles.sua',['id'=>$Item->id])}}" class="btn btn-warning">Sửa</a>
                                        @method('DELETE')

                                        <a href="" data-url ="{{route('roles.xoa',['id'=>$Item->id])}}" class="btn btn-danger " id="xoa">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$roles->links()}}
                    </div>
                </div>


            </div>
        </div>--}}
        <div class="card shadow mb-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">Tên Vai Trò</th>
                            <th scope="col">Mô Tả</th>
                            <th scope="col">Hoạt Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $Item )
                            <tr>
                                <td>{{$Item->name}}</td>
                                <td>{{$Item->display_name}}</td>
                                <td>

                                        @can('role-update')
                                    <a href="{{route('roles.sua',['id'=>$Item->id])}}" class="btn btn-warning">Sửa</a>
                                        @endcan
                                    @method('DELETE')
                                       {{-- @can('role-delete')
                                    <a href="" data-url ="{{route('roles.xoa',['id'=>$Item->id])}}" class="btn btn-danger " id="xoa">Xóa</a>
                                        @endcan--}}
                                </td>
                            </tr>
                        @endforeach
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
