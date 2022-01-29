@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('content')
    <div class="content-fluid" style="margin: 10px">
        @include('admins.partials.content-header',['name'=>'Ảnh Quảng Cáo','key'=>'Sửa '])

        <div class="content">
            <div class="container-fluid">
                <div class="row ">

                    <div class="col-md-12">

                        <form action="{{route('sliders.sua_gui' ,['id'=>$sliders->id])}}" method="post" enctype="multipart/form-data"    >
                            @csrf
                            {{-- <?php
                            dd($sanphams->thong_tin_sp)
                             ?>--}}

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Tên Ảnh Quảng Cáo</label>
                                    <input type="text" class="form-control" name="name" id=""
                                           placeholder=" Nhập Tên Ảnh Quảng Cáo" value="{{$sliders->name}}">
                                    <label>Thông Tin</label>
                                    <textarea type="number" class="form-control" name="des" id=""
                                           placeholder=" Thông Tin">{{$sliders->description}}
                                    </textarea>
                                    <div class="form-group">
                                        <label>Hình Ảnh</label>
                                        <input type="file" class="form-control-file" name="image" id=""
                                               placeholder="Hình Ảnh">
                                        <br/>
                                        <div class="col-md-12">
                                            <div class="row" >
                                                <img src="{{$sliders->image_path}}" style="height:156px;object-fit: cover" >
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@section('script')
    <script src="{{asset("content/js/list.js")}}"></script>
@endsection



@endsection


