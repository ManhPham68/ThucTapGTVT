<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
<title>Manh Dollar</title>
@endsection
@section('content')

<div class="content-fluid" style="margin: 10px">

          @include('admins.partials.content-header',['name'=>'Loại Sản Phẩm','key'=>'Danh Mục'])
    @can('category-add')
        <a href="{{route('loaisanphams.themmoi')}}" class="btn btn-success" style="margin-bottom: 10px">Thêm Mới Loại Sản Phẩm</a>
    @endcan

              {{--  @if(session()->has('success'))
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
                                    <th>Tên Loại Sản Phẩm</th>
                                    <th>Hoạt Động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loai_sps as $loai_sp)
                                    <tr>
                                        <td>{{$loai_sp->ten_loaisp}}</td>
                                        <td>

                                                @can('category-update')
                                            <a href="{{route('loaisanphams.sua',['id'=>$loai_sp->id])}}" class="btn btn-warning">Sửa</a>
                                                @endcan
                                            @method('DELETE')
                                                @can('category-delete')

                                            <a href="" data-url ="{{route('loaisanphams.xoa',['id'=>$loai_sp->id])}}" id="xoa" class="btn btn-danger" >Xóa</a>
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
