@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('content')
    <div class="content-fluid" style="margin: 10px">
        @include('admins.partials.content-header',['name'=>'Sản Phẩm','key'=>'Thêm Mới'])
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

                    <div class="col-md-12">

                            <form action="{{route('sanphams.themmoi_gui')}}" method="post" enctype="multipart/form-data"    >
                                @csrf
                                  <div class="form-group">
                                      <div class="col-md-6">
                                            <label>Tên Sản Phẩm</label>
                                            <input type="text" class="form-control" name='ten_sp' id=""
                                                   placeholder=" Nhập Tên Sản Phẩm" value="{{old('ten_sp')}}">
                                            <label>Giá Nhập</label>
                                            <input type="number" class="form-control" name=gia_nhap_sp id=""
                                                   placeholder=" Giá Nhập Sản Phẩm">
                                            <label>Giá Bán</label>
                                            <input type="number" class="form-control" name=gia_ban_sp id=""
                                                   placeholder=" Giá Bán Sản Phẩm">
                                            <label>Ảnh Sản Phẩm</label>
                                          <input type="file" class="form-control-file" name=anh_sp id=""
                                                 placeholder=" Ảnh Sản Phẩm">
                                          <label>Ảnh Chi Tiết Sản Phẩm</label>
                                          <input type="file" multiple class="form-control-file" name=link[] id="" ran
                                                 placeholder=" Ảnh Chi tiết Sản Phẩm">
                                            <label>Trạng Thái</label>
                                            <input type="number" class="form-control" name=trang_thai id="" min="0" max="1"
                                                   placeholder=" 1-Còn Hàng | 0-Hết Hàng">

                                            <label>Hãng Sản Xuất</label>
                                            <select name="hang_sx" class="form-control">
                                            <@foreach($hang_sx as $item)
                                                <option
                                                    value="{{$item -> id}}">{{$item ->ten_hangsx}}</option>
                                            @endforeach
                                            </select>

                                                <label>Loại Sản Phẩm</label>
                                                <select name="loai_sp" class="form-control">
                                                    <@foreach($loai_sp as $item)
                                                        <option
                                                            value="{{$item -> id}}">{{$item ->ten_loaisp}}</option>
                                                     @endforeach
                                            </select>
                                      </div>

                                        <label>Thông Tin</label>
                                        <textarea type="text" class="form-control"  name=thong_tin_sp id="mytextarea" rows="12"
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
@endsection

