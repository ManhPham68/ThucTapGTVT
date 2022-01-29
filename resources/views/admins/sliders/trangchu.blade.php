<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection

@section('content')

    <div class="content-fluid" style="margin: 10px">

        @include('admins.partials.content-header',['name'=>'Ảnh Quảng Cáo','key'=>'Danh Sách'])
        @can('slider-add')
            <a href="{{route('sliders.themmoi')}}" class="btn btn-success " style="margin-bottom: 10px">Thêm Mới Ảnh Quảng Cáo </a>
        @endcan

       {{-- @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif--}}
     {{--   <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('sliders.themmoi')}}" class="btn btn-success float-right m-2">Thêm Mới Ảnh Quảng Cáo</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Tên Ảnh Quảng Cáo</th>
                                <th scope="col">Thông Tin</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Hoạt Động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $Item )
                                <tr>
                                    <td>{{$Item->name}}</td>
                                    <td>{{$Item->description}}</td>
                                    <td><img src="{{$Item->image_path}}" style="height:156px;object-fit: cover" ></td>
                                    <td>
                                        <a href="{{route('sliders.sua',['id'=>$Item->id])}}" class="btn btn-default">Sửa</a>
                                        @method('DELETE')

                                        <a href="" data-url ="{{route('sliders.xoa',['id'=>$Item->id])}}" class="btn btn-danger " id="xoa">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$sliders->links()}}
                    </div>
                </div>


            </div>
        </div>
        ------------------------------}}


        <div class="card shadow mb-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">Tên Ảnh Quảng Cáo</th>
                            <th scope="col">Thông Tin</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Hoạt Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $Item )
                            <tr>
                                <td>{{$Item->name}}</td>
                                <td>{{$Item->description}}</td>
                                <td><img src="{{$Item->image_path}}" style="height:156px;object-fit: cover" ></td>
                                <td>

                                        @can('slider-update')
                                    <a href="{{route('sliders.sua',['id'=>$Item->id])}}" class="btn btn-warning">Sửa</a>
                                        @endcan

                                    @method('DELETE')
                                        @can('slider-delete')
                                    <a href="" data-url ="{{route('sliders.xoa',['id'=>$Item->id])}}" class="btn btn-danger " id="xoa">Xóa</a>
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
