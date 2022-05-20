@extends('public.layouts.master')

@section('title', 'Chi tiết')

@push('css')
    <link href="{{ asset('public/css/tintuc.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')

<main id="tintuc">
        <!-- breadcrumbs -->
        <section class="shop_breadcrumbs">
            <div class="page-title shop-page-title">
                <div class="page-title-inner container">
                    <ul class="breadcrumbs">
                        <li><a href="#"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li class="active"><span>Tin tức</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- nội dung -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- tổng hợp tin tức -->
                    <div class="col-lg-9 show_posts">
                        <div class="row post_single">
                            <div class="col-md-4">
                                <img src="image/ly-son.jpg" alt="">
                            </div>
                            <div class="col-md-7">
                                <div class="post_desc">
                                    <a href="#">
                                        <h2>Những địa điểm du lịch Đà Nẵng hấp dẫn nhất</h2>
                                    </a>
                                </div>
                                <ul class="posted_at">
                                    <li><i class="far fa-calendar-alt"></i> 28/08/2019</li>
                                    <li><i class="fas fa-user"></i> CÔNG TY TNHH LỮ HÀNH BALI TOURIST</li>
                                    <li><a href="#"><i class="fas fa-comments"></i> 0 Bình luận</a></li>
                                </ul>
                                <div class="read_continue">
                                    <a href="#">Xem tiếp</a>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="cus_divider"></div>
                            </div>
                        </div>
                        <!--------------->
                        <div class="row post_single">
                            <div class="col-md-4">
                                <img src="image/hagiang2.jpg" alt="">
                            </div>
                            <div class="col-md-7">
                                <div class="post_desc">
                                    <a href="#">
                                        <h2>Điểm du lịch Đà Lạt gắn với lịch sử – văn hóa tâm linh</h2>
                                    </a>
                                </div>
                                <ul class="posted_at">
                                    <li><i class="far fa-calendar-alt"></i> 28/08/2019</li>
                                    <li><i class="fas fa-user"></i> CÔNG TY TNHH LỮ HÀNH BALI TOURIST</li>
                                    <li><a href="#"><i class="fas fa-comments"></i> 0 Bình luận</a></li>
                                </ul>
                                <div class="read_continue">
                                    <a href="#">Xem tiếp</a>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="cus_divider"></div>
                            </div>
                        </div>
                        <!--------------->
                        <div class="row post_single">
                            <div class="col-md-4">
                                <img src="image/goi-ca-trich.jpg" alt="">
                            </div>
                            <div class="col-md-7">
                                <div class="post_desc">
                                    <a href="#">
                                        <h2>Phố Biển Nha Trang - Ngỡ Ngàng Nét Đẹp Nên Thơ</h2>
                                    </a>
                                </div>
                                <ul class="posted_at">
                                    <li><i class="far fa-calendar-alt"></i> 28/08/2019</li>
                                    <li><i class="fas fa-user"></i> CÔNG TY TNHH LỮ HÀNH BALI TOURIST</li>
                                    <li><a href="#"><i class="fas fa-comments"></i> 0 Bình luận</a></li>
                                </ul>
                                <div class="read_continue">
                                    <a href="#">Xem tiếp</a>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="cus_divider"></div>
                            </div>
                        </div>
                    </div>
                    <!-- side bar -->
                    <div class="col-lg-3 post_page_sidebar">
                        <div class="widget widget_baivietmoi">
                            <div class="widget_title">
                                <h4>Danh mục</h4>
                            </div>
                            <div class="widget_content">
                            </div>
                        </div>
                        <!----------------->
                        <div class="widget widget_baivietmoi">
                            <div class="widget_title">
                                <h4>Bài viết mới nhất</h4>
                            </div>
                            <div class="widget_content">
                                <div class="post_single">
                                    <a href="#" class="d-flex">
                                        <div class="post_avt">
                                            <img src="image/ly-son.jpg" alt="">
                                        </div>
                                        <div class="product_text">
                                            <h3>Những địa điểm du lịch Đà Nẵng hấp dẫn nhất</h3>
                                            <ul class="posted_at">
                                                <li>28/08/2019</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!---------------->
                                <div class="post_single">
                                    <a href="#" class="d-flex">
                                        <div class="post_avt">
                                            <img src="image/hagiang2.jpg" alt="">
                                        </div>
                                        <div class="product_text">
                                            <h3>Điểm du lịch Đà Lạt gắn với lịch sử – văn hóa tâm linh</h3>
                                            <ul class="posted_at">
                                                <li>28/08/2019</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!---------------->
                                <div class="post_single">
                                    <a href="#" class="d-flex">
                                        <div class="post_avt">
                                            <img src="image/goi-ca-trich.jpg" alt="">
                                        </div>
                                        <div class="product_text">
                                            <h3>Phố Biển Nha Trang - Ngỡ Ngàng Nét Đẹp Nên Thơ</h3>
                                            <ul class="posted_at">
                                                <li>28/08/2019</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!----------------->
                        <div class="widget widget_baivietmoi">
                            <div class="widget_title">
                                <h4>Facebook</h4>
                            </div>
                            <div class="widget_content">
                            </div>
                        </div>
                        <!----------------->
                        <div class="widget widget_baivietmoi">
                            <div class="widget_title">
                                <h4>Tags</h4>
                            </div>
                            <div class="widget_content">
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

@endpush