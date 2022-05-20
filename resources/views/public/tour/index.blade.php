@extends('public.layouts.master')

@section('title', 'Loại tour')

@push('css')
<link href="{{ asset('public/css/loaitour.css') }}" rel="stylesheet" type="text/css">

@endpush

@section('content')
<main id="loaitour">
        <!-- breadcrumbs -->
        <section class="shop_breadcrumbs">
            <div class="page-title shop-page-title">
                <div class="page-title-inner container">
                    <ul class="breadcrumbs">
                        <li><a href="#"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li class="active"><span>Tour trong nước</span></li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- nội dung -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- sidebar -->
                    @include('public.tour.sidebar')
                    <!-- nội dung tour -->
                    <div class="col-lg-9 noidungtour">
                        <div class="title_and_serachform">
                            <div class="cat_title">
                                <h1>TOUR TRONG NƯỚC</h1>
                            </div>
                            <div class="search_filter">
                                <span>Sắp xếp theo: </span>
                                <select id="" class="form-control">
                                    <option value="">Thứ tự</option>
                                    <option value="1">Mặc định</option>
                                    <option value="2">Bán chạy nhất</option>
                                    <option value="3">A → Z</option>
                                    <option value="4">Z → A</option>
                                    <option value="5">Giá tăng dần</option>
                                    <option value="6">Giá giảm dần</option>
                                    <option value="7">Hàng mới nhất</option>
                                    <option value="8">Hàng cũ nhất</option>
                                </select>
                            </div>
                        </div>

                        <div class="row show_products">
                            <div class="col-xl-3 col-md-4 col-6 product_single">
                                <div class="product_single_inner">
                                    <a href="#">
                                        <div class="product_avt">
                                            <img src="image/ly-son.jpg" alt="">
                                        </div>
                                        <div class="product_text">
                                            <h3>LÝ SƠN 2N1Đ_KHỞI HÀNH HẰNG NGÀY</h3>
                                            <div class="amount">
                                                <span>5.690.000₫</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="buy_now_btn">
                                        <a href="#datngay" class=""><span>Đặt ngay</span><i
                                                class="far fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!----------------->
                            <div class="col-xl-3 col-md-4 col-6 product_single on_sale">
                                <div class="product_single_inner">
                                    <a href="#">
                                        <div class="product_avt">
                                            <img src="image/goi-ca-trich.jpg" alt="">
                                            <div class="sale_tag">SALE</div>
                                        </div>
                                        <div class="product_text">
                                            <h3>PHÚ QUỐC 3N2Đ - KHỞI HÀNH ĐỊNH KỲ</h3>
                                            <div class="amount">
                                                <span>5.690.000₫</span>
                                                <del>5.990.000₫</del>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="buy_now_btn">
                                        <a href="#datngay" class=""><span>Đặt ngay</span><i
                                                class="far fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!----------------->
                            <div class="col-xl-3 col-md-4 col-6 product_single">
                                <div class="product_single_inner">
                                    <a href="#">
                                        <div class="product_avt">
                                            <img src="image/goi-ca-trich.jpg" alt="">
                                        </div>
                                        <div class="product_text">
                                            <h3>PHÚ QUỐC 3N2Đ - KHỞI HÀNH ĐỊNH KỲ</h3>
                                            <div class="amount">
                                                <span>5.690.000₫</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="buy_now_btn">
                                        <a href="#datngay" class=""><span>Đặt ngay</span><i
                                                class="far fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!----------------->
                            <div class="col-xl-3 col-md-4 col-6 product_single">
                                <div class="product_single_inner">
                                    <a href="#">
                                        <div class="product_avt">
                                            <img src="image/goi-ca-trich.jpg" alt="">
                                        </div>
                                        <div class="product_text">
                                            <h3>PHÚ QUỐC 3N2Đ - KHỞI HÀNH ĐỊNH KỲ</h3>
                                            <div class="amount">
                                                <span>5.690.000₫</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="buy_now_btn">
                                        <a href="#datngay" class=""><span>Đặt ngay</span><i
                                                class="far fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!----------------->
                            <div class="col-xl-3 col-md-4 col-6 product_single">
                                <div class="product_single_inner">
                                    <a href="#">
                                        <div class="product_avt">
                                            <img src="image/goi-ca-trich.jpg" alt="">
                                        </div>
                                        <div class="product_text">
                                            <h3>PHÚ QUỐC 3N2Đ - KHỞI HÀNH ĐỊNH KỲ</h3>
                                            <div class="amount">
                                                <span>5.690.000₫</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="buy_now_btn">
                                        <a href="#datngay" class=""><span>Đặt ngay</span><i
                                                class="far fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!----------------->
                            <div class="col-xl-3 col-md-4 col-6 product_single">
                                <div class="product_single_inner">
                                    <a href="#">
                                        <div class="product_avt">
                                            <img src="image/goi-ca-trich.jpg" alt="">
                                        </div>
                                        <div class="product_text">
                                            <h3>PHÚ QUỐC 3N2Đ - KHỞI HÀNH ĐỊNH KỲ</h3>
                                            <div class="amount">
                                                <span>5.690.000₫</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="buy_now_btn">
                                        <a href="#datngay" class=""><span>Đặt ngay</span><i
                                                class="far fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!----------------->
                            <div class="col-xl-3 col-md-4 col-6 product_single">
                                <div class="product_single_inner">
                                    <a href="#">
                                        <div class="product_avt">
                                            <img src="image/goi-ca-trich.jpg" alt="">
                                        </div>
                                        <div class="product_text">
                                            <h3>PHÚ QUỐC 3N2Đ - KHỞI HÀNH ĐỊNH KỲ</h3>
                                            <div class="amount">
                                                <span>5.690.000₫</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="buy_now_btn">
                                        <a href="#datngay" class=""><span>Đặt ngay</span><i
                                                class="far fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="pagination justify-content-center mt-4 mb-5">
                            <li class="page-item disabled"><a class="page-link" href="">&laquo;</a></li>
                            <li class="page-item active"><a class="page-link" href="">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

@endsection

@section('sidebarMobile')


@endsection

@push('js')
<script src="{{ asset('public/js/loaitour.js') }}"></script>
@endpush