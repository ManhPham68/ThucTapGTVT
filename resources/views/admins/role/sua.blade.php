<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('css')
    <link href="{{asset('vendor/role/add/add.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="content-fluid" style="margin: 10px">
        @include('admins.partials.content-header',['name'=>'Vai Trò Hệ Thống','key'=>'Sửa'])
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <form action="{{route('roles.sua_gui',['id'=>$role->id])}}" method="post" enctype="multipart/form-data" style="width: 100%">
                        <div class="col-md-12">


                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên Vai Trò</label>
                                <input type="text" class="form-control" name="name"
                                       placeholder=" Nhập Tên Vai Trò" value="{{$role->name}}">
                                <label>Mô Tả</label>
                                <textarea type="text" class="form-control" name="display_name" rows="6"
                                          placeholder="Mô Tả">{{$role->display_name}}
                                </textarea>
                            </div>

                            {{-- show ra textbox để phân quyền--}}

                        </div>
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-12">
                                    <label>
                                        <input type="checkbox" class="checkall">
                                        CheckAll
                                    </label>
                                </div>


                                @foreach($permissionsParent  as $i)
                                    <div class="card bg-light mb-3 col-md-12 " >
                                        <div class="card-header">
                                            <label >
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>
                                            {{$i->name}}
                                        </div>

                                        <div class="row">
                                            @foreach($i->permissionsChildrent  as $perChilder)

                                                <div class="card-body col-md-3 ">
                                                    <h5 class="card-title ">
                                                        <label >
                                                            <input type="checkbox" name="permission_id[]" class="checkbox_childrent"
                                                                   {{$permissionsChecked->contains('id',$perChilder->id)?'checked':''}}
                                                                   value="{{ $perChilder->id}}">
                                                        </label>
                                                        {{ $perChilder->name}}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset("vendor/role/add/add.js")}}"></script>

@endsection

