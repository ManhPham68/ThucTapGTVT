{{--<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{$key . ' ' . $name}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{$name}}</a></li>
                    <li class="breadcrumb-item active">{{$key}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>--}}
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$key . ' ' . $name}}</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class=""></i> {{$name .' / '. $key}}</a>
</div>
