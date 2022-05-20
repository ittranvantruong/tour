@extends('public.layouts.master')

@section('title', 'Trang chủ')

@push('css')
<link href="{{ asset('public/css/homepage.css') }}" rel="stylesheet" type="text/css">

@endpush

@section('content')

<main>
    <!-------------------- Slide Banner ---------------------->
    <div class="row">
        <div class="col col-12">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('public/uploads/images/banner2.jpeg') }}" width="100%" height="550px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public/uploads/images/banner.jpeg') }}" width="100%" height="550px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public/uploads/images/banner2.jpeg') }}" width="100%" height="550px">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
    <!-------------------- End Slide Banner ---------------------->

    <section id="box_tim_kiem" class="container">
        <div class="row" id="des_search">
            <div class="col-12 col-md-4">
                <p class="m-0 text-warning">Nhóm tour</p>
                <select class="form-control tour_group">
                    <option value="">-- Tất cả --</option>
                    <option value="noiden_tn">Trong nước</option>
                    <option value="noiden_nn">Nước ngoài</option>
                </select>
            </div>
            <div class="col-12 col-md-4">
                <p class="m-0 text-warning">Nơi khởi hành</p>
                <select class="form-control tour_group">
                    <option value="">-- Tất cả --</option>
                    <option value="noiden_tn">Trong nước</option>
                    <option value="noiden_nn">Nước ngoài</option>
                </select>
            </div>
            <div class="col-12 col-md-4">
                <p class="m-0 text-warning">Nơi đến</p>
                <select class="form-control tour_group">
                    <option value="">-- Tất cả --</option>
                    <option value="noiden_tn">Trong nước</option>
                    <option value="noiden_nn">Nước ngoài</option>
                </select>
            </div>
            <div class="col-12 pt-2 text-center">
                <button class="btn btn-warning text-white text-uppercase">
                    Tìm kiếm</button>
            </div>
        </div>
        <div id="des_mobi">

        </div>
    </section>

    <section id="banner_bottom_search" class="pb-3">
        <div class="container pt-1">
            <div class="row">
                <div class="col-12 pt-1 col-md-6">
                    <img class="rounded" src="{{ asset('public/uploads/images/banner.jpeg') }}" width="100%" height="250px">
                </div>
                <div class="col-12 col-md-6 pt-1">
                    <img class="rounded" src="{{ asset('public/uploads/images/banner.jpeg') }}" width="100%" height="250px">
                </div>
            </div>
        </div>
    </section>

    @include('public.search-mobile')

    <!-- main nav tabs 1 -->
    <section class="container pb-5" id="main_desktop">
        <div class="row">
            <div class="col-12 col-md-9">
                <!-- Tab content number 1 -->
                <div class="pb-3" id="tab_content_1">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item display_none_mobi" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#tour_khuyen_mai">
                                TOUR NƯỚC NGOÀI
                            </button>
                        </li>
                        <li class="nav-item display_none_mobi" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile">
                                TOUR TRONG NƯỚC
                            </button>
                        </li>
                        <li class="nav-item display_none_mobi" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact">
                                TOUR KHUYẾN MÃI
                            </button>
                        </li>

                        <div class="dropdown display_none_desktop">
                            <button class="nav-link dropdown active dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                TOUR NƯỚC NGOÀI
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="home-tab">
                                <li>
                                    <button class="dropdown-item" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#tour_khuyen_mai">
                                        TOUR NƯỚC NGOÀI
                                    </button>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile">
                                        TOUR TRONG NƯỚC
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact">
                                        TOUR KHUYẾN MÃI
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </ul>

                    <div class="tab-content pt-2" id="myTabContent">
                        <div class="tab-pane fade show active" id="tour_khuyen_mai">
                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <div class="product_single_inner">
                                        <a href="#">
                                            <div class="product_avt">
                                                <img src="./img/banner2.jpeg" width="100%">
                                                <div class="sale_tag">SALE</div>

                                                <div class="product_text p-1">
                                                    <h3 class="m-0">PHÚ QUỐC 3N2Đ - KHỞI HÀNH ĐỊNH KỲ</h3>
                                                    <div class="amount m-0">
                                                        <span>5.690.000₫</span>
                                                        <del>5.990.000₫</del>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="buy_now_btn">
                                            <a href="#datngay" class=""><span>Đặt ngay</span><i
                                                    class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile">...</div>
                        <div class="tab-pane fade" id="contact">...</div>
                        <a id="btn_xem_them" href="#">Xem thêm >></a>
                    </div>
                </div>
                <!-- End tab content number 1 -->

                <!-- Tab content number 2 -->
                <div class="pb-3" id="tab_content_2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item display_none_mobi" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#tour_hang_ngay">
                                TOUR HÀNG NGÀY
                            </button>
                        </li>
                        <li class="nav-item display_none_mobi" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#tour_sinh_thai">
                                TOUR SINH THÁI
                            </button>
                        </li>
                        <li class="nav-item display_none_mobi" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#teambuilding">
                                TEAMBUILDING
                            </button>
                        </li>

                        <div class="dropdown display_none_desktop">
                            <button class="nav-link dropdown active dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                TOUR HÀNG NGÀY
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="home-tab">
                                <li>
                                    <a class="dropdown-item" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#tour_hang_ngay">
                                        TOUR HÀNG NGÀY
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#tour_sinh_thai">
                                        TOUR SINH THÁI
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#teambuilding">
                                        TEAMBUILDING
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </ul>
                    <div class="tab-content pt-2" id="myTabContent">
                        <div class="tab-pane fade show active" id="tour_hang_ngay">
                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <div class="product_single_inner">
                                        <a href="#">
                                            <div class="product_avt">
                                                <img src="./img/banner2.jpeg" width="100%">
                                                <div class="sale_tag">SALE</div>

                                                <div class="product_text p-1">
                                                    <h3 class="m-0">PHÚ QUỐC 3N2Đ - KHỞI HÀNH ĐỊNH KỲ</h3>
                                                    <div class="amount m-0">
                                                        <span>5.690.000₫</span>
                                                        <del>5.990.000₫</del>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="buy_now_btn">
                                            <a href="#datngay" class=""><span>Đặt ngay</span><i
                                                    class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tour_sinh_thai">...</div>
                        <div class="tab-pane fade" id="teambuilding">...</div>
                        <a id="btn_xem_them" href="#">Xem thêm >></a>
                    </div>
                </div>
                <!-- End tab content number 2 -->
            </div>

            <div class="col-12 col-md-3">
                <div id="box_main_side">
                    <div class="side_box_title">TOUR KHUYẾN MÃI</div>
                    <div class="content_box_title">Chưa có khuyến mãi</div>
                </div>
                <div class="pb-2"></div>
                <div id="box_main_side">
                    <div class="side_box_title text-uppercase">Cẩm nang du lịch</div>
                    <div class="content_box_title">
                        <div class="box_blog_text">
                            <a href="#">
                                <img src="./img/banner.jpeg" width="100%" height="160px">
                                <div class="bottom-left">
                                    <span class="fw-bold">Những địa điểm du lịch Đà Nẵng hấp dẫn nhất</span>
                                    <br>28/08/2019
                                </div>
                            </a>
                        </div>

                        <p class="m-2"> </p>
                        <a href="#" style="text-decoration: none;">
                            <div class="row box_blog_img_left">
                                <div class="col-4">
                                    <img src="./img/banner.jpeg" width="100%" height="50px">
                                </div>
                                <div class="col-8 ps-0">
                                    <p class="m-0 fw-bold">Điểm du lịch Đà Lạt gắn với lịch sử văn hóa tâm linh</p>
                                    <p class="m-0">28/08/2019</p>
                                </div>
                            </div>
                        </a>

                        <p class="m-2"> </p>
                        <a href="#" style="text-decoration: none;">
                            <div class="row box_blog_img_left">
                                <div class="col-4">
                                    <img src="./img/banner.jpeg" width="100%" height="50px">
                                </div>
                                <div class="col-8 ps-0">
                                    <p class="m-0 fw-bold">Điểm du lịch Đà Lạt gắn với lịch sử văn hóa tâm linh</p>
                                    <p class="m-0">28/08/2019</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Văn hóa, ẩm thực tabs -->
                <div class="pb-2"></div>
                <div id="box_main_side">
                    <div class="side_box_title text-uppercase">Văn hóa, ẩm thực</div>
                    <div class="content_box_title">
                        <a href="#" style="text-decoration: none;">
                            <div class="row box_blog_img_left">
                                <div class="col-4">
                                    <img src="./img/banner.jpeg" width="100%" height="50px">
                                </div>
                                <div class="col-8 ps-0">
                                    <p class="m-0 fw-bold">Điểm du lịch Đà Lạt gắn với lịch sử văn hóa tâm linh</p>
                                    <p class="m-0">28/08/2019</p>
                                </div>
                            </div>
                        </a>
                        <p class="m-2"> </p>

                        <a href="#" style="text-decoration: none;">
                            <div class="row box_blog_img_left">
                                <div class="col-4">
                                    <img src="./img/banner.jpeg" width="100%" height="50px">
                                </div>
                                <div class="col-8 ps-0">
                                    <p class="m-0 fw-bold">Điểm du lịch Đà Lạt gắn với lịch sử văn hóa tâm linh</p>
                                    <p class="m-0">28/08/2019</p>
                                </div>
                            </div>
                        </a>
                        <p class="m-2"> </p>

                        <a href="#" style="text-decoration: none;">
                            <div class="row box_blog_img_left">
                                <div class="col-4">
                                    <img src="./img/banner.jpeg" width="100%" height="50px">
                                </div>
                                <div class="col-8 ps-0">
                                    <p class="m-0 fw-bold">Điểm du lịch Đà Lạt gắn với lịch sử văn hóa tâm linh</p>
                                    <p class="m-0">28/08/2019</p>
                                </div>
                            </div>
                        </a>
                        <p class="m-2"> </p>
                    </div>
                </div>

                <!-- KHỞI HÀNH TỪ -->
                <div class="pb-2"></div>
                <div id="box_main_side">
                    <div class="side_box_title">KHỞI HÀNH TỪ</div>
                    <div class="content_box_title">TP. HCM</div>
                </div>
            </div>
        </div>
    </section>

    @include('public.partner')
</main>

@endsection

@section('sidebarMobile')

@include('public.sidebar-mobile')

@endsection

@push('js')
<script src="{{ asset('public/js/header.js') }}"></script>
@endpush