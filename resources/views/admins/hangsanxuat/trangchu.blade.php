<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
<title>Manh Dollar</title>
@endsection
@section('content')

<div class="content-fluid" style="margin: 10px">

    @include('admins.partials.content-header',['name'=>'Hãng Sản Xuất','key'=>'Danh Sách'])
    @can('branch-add')
        <a href="{{route('hangsanxuats.themmoi')}}" class="btn btn-success" style="margin-bottom: 10px">Thêm Mới Hãng Sản Xuất</a>
    @endcan

{{--    @if(session()->has('success'))--}}
{{--    <div class="alert alert-success">--}}
{{--        {{ session()->get('success') }}--}}
{{--    </div>--}}
{{--    @endif--}}
    <div class="card shadow mb-12">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Tên Hãng Sản Xuất</th>
                        <th>Hoạt Động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hang_sxs as $hang_sx)
                        <tr>
                            <td>{{$hang_sx->ten_hangsx}}</td>
                            {{-- <td>{{$hang_sx->thong_tin}}</td>--}}
                            <td>

                                    @can('branch-update')
                                <a href="{{route('hangsanxuats.sua',['id'=>$hang_sx->id])}}" class="btn btn-warning">Sửa</a>
                                    @endcan
                                @method('DELETE')
                                    @can('branch-delete')
                                <a href="" data-url ="{{route('hangsanxuats.xoa',['id'=>$hang_sx->id])}}" class="btn btn-danger" id="xoa">Xóa</a>
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
