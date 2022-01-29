<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection

@section('content')

    <div class="content-fluid" style="margin: 10px">

        @include('admins.partials.content-header',['name'=>'Sản Phẩm','key'=>'Danh Sách'])
        @can('product-add')
            <a href="{{route('sanphams.themmoi')}}" class="btn btn-success " style="margin-bottom: 10px">Thêm Mới Sản Phẩm </a>
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
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Giá Bán Sản Phẩm</th>
                            <th scope="col">Ảnh Sản Phẩm</th>
                            <th scope="col">Trạng Thái</th>
                           {{-- <th scope="col">Thông Tin</th>--}}
                            <th scope="col">Hãng sản xuất</th>
                            <th scope="col">Loại sản phẩm</th>
                            <th scope="col">Hoạt Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sanphams as $spItem )
                            <tr>
                                <td>{{$spItem->ten_sp}}</td>
                                <td>{{number_format($spItem->gia_ban_sp)}}$</td>
                                <td><img src="{{$spItem->anh_sp}}" style="height:156px;object-fit: cover" ></td>
                                <td>{{$spItem->trang_thai==1 ? 'Còn Hàng' : ''}}{{$spItem->trang_thai==0 ? 'Hết Hàng' : ''}}</td>
                                 {{-- <td>{!!$spItem->thong_tin_sp!!}</td>--}}
                                <td>{{optional($spItem->creator)->ten_hangsx}}</td>
                                <td>{{optional($spItem->catagory)->ten_loaisp}}</td>

                                <td>

                                    @can('product-update')
                                    <a href="{{route('sanphams.sua',['id'=>$spItem->id])}}" class="btn btn-warning">Sửa</a>
                                        @endcan
                                        @can('product-detail')
                                            <a href="{{route('sanphams.chitiet',['id'=>$spItem->id])}}" class="btn btn-info">Chi Tiết</a>
                                        @endcan
                                    @method('DELETE')
                                        @can('product-delete')

                                    <a href="" data-url ="{{route('sanphams.xoa',['id'=>$spItem->id])}}" class="btn btn-danger " id="xoa">Xóa</a>
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
