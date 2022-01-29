<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
<title>Manh Dollar</title>
@endsection
@section('content')
<div class="content-fluid" style="margin: 10px">
    @include('admins.partials.content-header',['name'=>'Hãng Sản Xuất','key'=>'Thêm Mới'])
    <div class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-6">

                    <form action="{{route('hangsanxuats.themmoi_gui')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên Hãng Sản Xuất</label>
                            <input type="text" class="form-control" name='ten_hangsx' id="" placeholder=" Nhập Tên Hãng Sản Xuất">
                            <label>Thông Tin</label>
                            <textarea type="text" class="form-control"  name=thong_tin id="mytextarea" rows="12"
                                      placeholder=" Thông Tin">
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm Mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script src="https://cdn.tiny.cloud/1/kktpoxr7mtiwg1ee6e8uakumipvx363fa6irx5y0dwsro05y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{asset("content/js/list.js")}}"></script>
    @endsection


</script>

@endsection
