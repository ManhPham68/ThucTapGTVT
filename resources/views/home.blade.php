<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-fluid">
        <!-- Content Header (Page header) -->
        @include('admins.partials.content-header',['name'=>'Trang Chủ','key'=>''])
        <!-- /.content-header -->

        <!-- Main content -->
      {{--  <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                       Trang Chủ
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>--}}
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

