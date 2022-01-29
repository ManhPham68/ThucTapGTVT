@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('content')
    <div class="content-fluid" style="margin: 10px">
        @include('admins.partials.content-header',['name'=>'Sản Phẩm','key'=>'Sửa '])

        <div class="content">
            <div class="container-fluid">
                <div class="row ">

                    <div class="col-md-12">

                        <form action="{{route('sanphams.sua_gui' ,['id'=>$sanphams->id])}}" method="post" enctype="multipart/form-data"    >
                            @csrf
                           {{-- <?php
                           dd($sanphams->thong_tin_sp)
                            ?>--}}

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" name='ten_sp' id=""
                                           placeholder=" Nhập Tên Sản Phẩm" value="{{$sanphams->ten_sp}}">
                                    <label>Giá Nhập</label>
                                    <input type="number" class="form-control" name=gia_nhap_sp id=""
                                           placeholder=" Giá Nhập Sản Phẩm" value="{{$sanphams->gia_nhap_sp}}">
                                    <label>Giá Bán</label>
                                    <input type="number" class="form-control" name=gia_ban_sp id=""
                                           placeholder=" Giá Bán Sản Phẩm"value="{{$sanphams->gia_ban_sp}}">
                                    <div class="form-group">
                                        <label>Ảnh Sản Phẩm</label>
                                        <input type="file" class="form-control-file" name=anh_sp id=""
                                               placeholder=" Ảnh Sản Phẩm">
                                        <br/>
                                        <div class="col-md-12">
                                            <div class="row" >
                                                <img src="{{$sanphams->anh_sp}}" style="height:156px;object-fit: cover" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh Chi Tiết Sản Phẩm</label>
                                        <input type="file" multiple class="form-control-file" name=link[] id=""
                                               placeholder=" Ảnh Chi tiết Sản Phẩm">
                                        <br/>
                                        <div class="col-md-12">
                                            <div class="row">
                                                @foreach($sanphams->images as $imageItem)
                                                <img src="{{$imageItem->Link}}" style="height:156px;object-fit: cover;padding-right: 10px" >
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <label>Trạng Thái</label>
                                    <input type="number" class="form-control" name=trang_thai id="" min="0" max="1"
                                           placeholder=" 1 - Còn Hàng || 0 - Hết Hàng " value="{{$sanphams->trang_thai}}">

                                    <label>Hãng Sản Xuất</label>
                                    <select name="hang_sx" class="form-control">
                                        <@foreach($hang_sx as $item)
                                            <option
                                                value="{{$item -> id}}"{{$hang_sx_selected->id==$item->id?'selected':''}}>{{$item->ten_hangsx}}</option>
                                        @endforeach
                                    </select>

                                    <label>Loại Sản Phẩm</label>
                                    <select name="loai_sp" class="form-control">
                                        <@foreach($loai_sp as $item)
                                            <option
                                                value="{{$item -> id}}" {{$loai_sp_selected->id==$item->id?'selected':''}}>{{$item->ten_loaisp}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label>Thông Tin</label>
                                <textarea type="text" class="form-control" name=thong_tin_sp id="mytextarea" rows="12"
                                          placeholder="Thông Tin">{!!$sanphams->thong_tin_sp!!}
                                </textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Sửa</button>
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

{{--@section('js')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
     <script src="{{asset('vendor/admin/sanpham/add.js')}}"></script>
@endsection--}}

