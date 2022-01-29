@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('css')

    <link href="{{asset('vendor/product/product-detail.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div class="content-fluid" style="margin: 10px">

    @include('admins.partials.content-header',['name'=>'Sản Phẩm','key'=>'Chi Tiết'])
        <main role="main">
            <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
            <div class="container mt-4">
                <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="card">
                    <div class="container-fliud">
                        <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                              action="/php/twig/frontend/giohang/themvaogiohang">
                            <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                            <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                            <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                            <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                            <div class="wrapper row">
                                <div class="preview col-md-6">
                                    <div class="preview-pic tab-content">
                                        <div class="tab-pane active" id="pic-{{$sanphams->id}}">
                                            <img src="{{$sanphams->anh_sp}}"style="width:350px">
                                        </div>
                                        @foreach($sanphams->images as $imageItem)
                                        <div class="tab-pane" id="pic-{{$imageItem->id}}">
                                            <img src="{{$imageItem->Link}}" style="width:350px">
                                        </div>
                                        @endforeach

                                    </div>
                                    <ul class="preview-thumbnail nav nav-tabs">
                                        <li class="active">
                                            <a data-target="#pic-{{$sanphams->id}}" data-toggle="tab" class="">
                                                <img src="{{$sanphams->anh_sp}}" style="width:350px">
                                            </a>
                                        </li>
                                        @foreach($sanphams->images as $imageItem)
                                        <li class="">
                                            <a data-target="#pic-{{$imageItem->id}}" data-toggle="tab" class="">
                                                <img src="{{$imageItem->Link}}" style="width:350px">
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="details col-md-6">
                                    <h3 class="product-title">{{$sanphams->ten_sp}}</h3>
                                    <div class="rating">
                                       {{-- <div class="stars">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>--}}
                                        <span class="review-no">Tình Trạng : {{$sanphams->trang_thai==1 ? 'Còn Hàng' : ''}}{{$sanphams->trang_thai==0 ? 'Hết Hàng' : ''}}</span>
                                    </div>

                                  {{--  <small class="text-muted">Giá cũ: <s><span>10,990,000.00 vnđ</span></s></small>--}}
                                    <h4 class="price">Giá hiện tại: <span>{{number_format($sanphams->gia_ban_sp)}}$</span></h4>
                                    <p class="product-description">{!! $sanphams->thong_tin_sp !!}</p>

                                    <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                        <strong>Uy
                                            tín</strong>!</p>
                                   {{-- <h5 class="sizes">sizes:
                                        <span class="size" data-toggle="tooltip" title="cỡ Nhỏ">s</span>
                                        <span class="size" data-toggle="tooltip" title="cỡ Trung bình">m</span>
                                        <span class="size" data-toggle="tooltip" title="cỡ Lớn">l</span>
                                        <span class="size" data-toggle="tooltip" title="cỡ Đại">xl</span>
                                    </h5>
                                    <h5 class="colors">colors:
                                        <span class="color orange not-available" data-toggle="tooltip"
                                              title="Hết hàng"></span>
                                        <span class="color green"></span>
                                        <span class="color blue"></span>
                                    </h5>--}}
                                   {{-- <div class="form-group">
                                        <label for="soluong">Số lượng đặt mua:</label>
                                        <input type="number" class="form-control" id="soluong" name="soluong">
                                    </div>--}}
                                    <div class="action">
                                        <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang" href="{{ route('add.to.cart', $sanphams->id) }}">Thêm vào giỏ hàng</a>
                                        <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

           {{--     <div class="card">
                    <div class="container-fluid">
                        <h3>Thông tin chi tiết về Sản phẩm</h3>
                        <div class="row">
                            <div class="col">
                                Vi xử lý Dual-core 1 Cortex-A9 tốc độ 1GHz
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
            <!-- End block content -->
        </main>

        @section('script')
            <script src="{{asset("vendor/product/product-detail.js")}}"></script>
        @endsection
    </div>
@endsection
