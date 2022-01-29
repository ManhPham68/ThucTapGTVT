{{--
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admins/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admins/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Manh Dollar</a>
            </div>
        </div>


        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" id='sidebarToggle'>
                    <a href="{{route('loaisanphams.trangchu')}}"data-url class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh Mục Sản Phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item" id='sidebarToggle'>
                    <a href="{{route('hangsanxuats.trangchu')}}"data-url class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                          Hãng Sản Xuất
                        </p>
                    </a>
                </li>
                <li class="nav-item" id='sidebarToggle'>
                    <a href="{{route('sanphams.trangchu')}}"data-url class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sản Phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item" id='sidebarToggle'>
                    <a href="{{route('sliders.trangchu')}}"data-url class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Ảnh Quảng Cáo
                        </p>
                    </a>
                </li>
                <li class="nav-item" id='sidebarToggle'>
                    <a href=""data-url="{{route('users.trangchu')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Danh Sách Nhân Viên
                        </p>
                    </a>
                </li>
                <li class="nav-item" id='sidebarToggle'>
                    <a href="" data-url="{{route('roles.trangchu')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Vai Trò Hệ Thống
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>
--}}
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{--{{url("/admin/home")}}--}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Nav Item - Tables -->
    @can('category-list')
    <li class="nav-item">
        <a class="nav-link" href="{{route('loaisanphams.trangchu')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Danh Mục Sản Phẩm</span></a>
    </li>
    @endcan
    @can('branch-list')
    <li class="nav-item">
        <a class="nav-link" href="{{route('hangsanxuats.trangchu')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Hãng Sản Xuất</span></a>
    </li>
    @endcan
    @can('product-list')
    <li class="nav-item">
        <a class="nav-link" href="{{route('sanphams.trangchu')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Sản Phẩm</span></a>
    </li>
    @endcan
    @can('slider-list')
    <li class="nav-item">
        <a class="nav-link" href="{{route('sliders.trangchu')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Ảnh Quảng Cáo</span></a>
    </li>
    @endcan
    @can('user-list')
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.trangchu')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Danh Mục Nhân Viên</span></a>
    </li>
    @endcan
    @can('role-list')
    <li class="nav-item">
        <a class="nav-link" href="{{route('roles.trangchu')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Vai Trò Hệ Thống</span></a>
    </li>
    @endcan


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
