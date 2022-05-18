<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#managerTour"
            aria-expanded="true" aria-controls="managerOrder">
            <i class="fas fa-people-carry"></i>
            <span>Quản lý tour</span>
        </a>
        <div id="managerTour" class="collapse" aria-labelledby="headingTwo" data-parent="#managerTour">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.tour.create') }}">Thêm tour</a>
                <a class="collapse-item" href="{{ route('admin.tour.index') }}">Danh sách tour</a>
                <a class="collapse-item" href="{{ route('admin.tour.place.index', ['type' => 0]) }}">Nơi khởi hành</a>
                <a class="collapse-item" href="{{ route('admin.tour.place.index', ['type' => 1]) }}">Nơi đến</a>
                <a class="collapse-item" href="{{ route('admin.category.tour.index') }}">Danh mục</a>
            </div>
        </div>
    </li>
    {{--

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#managerCustomer"
            aria-expanded="true" aria-controls="managerCustomer">
            <i class="fas fa-user-friends"></i>
            <span>Quản lý bàn</span>
        </a>
        <div id="managerCustomer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('create.user') }}">Thêm bàn</a>
                <a class="collapse-item" href="{{ route('index.user', ['role' => collect(config('mevivu.role.user'))->keys()->all()[1]]) }}">Danh sách bàn</a>
            </div>
        </div>
    </li>
    --}}
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->