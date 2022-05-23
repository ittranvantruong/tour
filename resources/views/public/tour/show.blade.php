@extends('public.layouts.master')

@section('title', 'Chi tiết')

@push('css')
    <link href="{{ asset('public/css/chitiettour.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
@endpush

@section('content')

<main id="chitiettour">
        <!-- breadcrumbs -->
        <section class="shop_breadcrumbs">
            <div class="page-title shop-page-title">
                <div class="page-title-inner container">
                    <ul class="breadcrumbs">
                        <li><a href="#"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li class="active"><span>HÀ GIANG - CHÈO THUYỀN SÔNG NHO QUẾ 4N3Đ - KH: THỨ 5 HÀNG TUẦN</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!--  hình ảnh tour -->
        <section>
            <div class="container">
                <div class="row product_single products">
                    <div class="col-lg-6">
                        <div class="fotorama" data-nav="thumbs" data-transition="crossfade" data-allowfullscreen="true"
                            data-fit="cover">
                            <img src="image/hagiang1.jpg">
                            <img src="image/hagiang2.jpg">
                        </div>
                        <div class="sale_tag">SALE</div>
                    </div>
                    <div class="col-lg-6 product_desc">
                        <div class="name_tour">
                            <h1>HÀ GIANG - CHÈO THUYỀN SÔNG NHO QUẾ 4N3Đ - KH: THỨ 5 HÀNG TUẦN</h1>
                        </div>
                        <div class="amount">
                            <span>5.690.000₫</span>
                            <del>5.990.000₫</del>
                        </div>
                        <div>Mã tour: 123</div>
                        <hr />
                        <div class="thongtin_tour row">
                            <div class="col-md-6">
                                <strong>Nơi khởi hành</strong>
                                <span><a href="#">Hồ Chí Minh</a></span>
                            </div>
                            <div class="col-md-6">
                                <strong>Nơi đến</strong>
                                <span>
                                    <a href="#">Hà Giang</a>,
                                    <a href="#">Hà Nội</a>
                                </span>
                            </div>
                        </div>
                        <hr />
                        <div class="row lienhe_box">
                            <div class="col-md-6">
                                <a href="#"><i class="fab fa-telegram-plane"></i>Liên hệ</a>
                            </div>
                            <div class="col-md-6">
                                <a href="tel:"><i class="fas fa-phone-alt"></i>0907458176</a>
                            </div>
                        </div>
                        <hr />
                        <div class="tags_lienquan">
                            <div>
                                Tags:
                                <a class="tags" href="#" rel="tag"><span></span>Hà Giang</a>
                                <a class="tags" href="#" rel="tag"><span></span>Hà Nội</a>
                                <a class="tags" href="#" rel="tag"><span></span>Hồ Chí Minh</a>
                            </div>
                        </div>
                        <div class="likeshare_btn">
                            <div>
                                <a href="#"><i class="fas fa-thumbs-up"></i> Thích</a>
                                <a href="#">Chia sẻ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- nội dung -->
        <section class="noidung">
            <div class="container">
                <div class="row">
                    <!-- nội dung tour -->
                    <div class="col-lg-9 noidungtour">
                        <nav class="d-none d-md-block show_on_desk">
                            <div class="nav nav-tabs">
                                <a class="nav-item nav-link active" data-bs-toggle="tab" href="#chuong-trinh"
                                    role="tab" aria-controls="nav-home" aria-selected="true">Chương trình tour</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#dieu-khoan"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Điều khoản</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#quy-dinh"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">Quy định</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#binh-luan"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">Bình luận</a>
                            </div>
                        </nav>
                        <div class="description_tab d-md-none">
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="dropdown-toggle">
                                    <span id="tabs_title">Chương trình tour</span>
                                </a>
                                <nav class="hidden_on_desk dropdown-menu">
                                    <div class="nav nav-tabs">
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#chuong-trinh" onclick="changeTabTitle('Chương trình tour')"
                                            role="tab" aria-controls="nav-home" aria-selected="true">Chương trình tour</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#dieu-khoan" onclick="changeTabTitle('Điều khoản')"
                                            role="tab" aria-controls="nav-profile" aria-selected="false">Điều khoản</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#quy-dinh" onclick="changeTabTitle('Quy định')"
                                            role="tab" aria-controls="nav-contact" aria-selected="false">Quy định</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#binh-luan" onclick="changeTabTitle('Bình luận')"
                                            role="tab" aria-controls="nav-contact" aria-selected="false">Bình luận</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="chuong-trinh" role="tabpanel" aria-labelledby="nav-home-tab">
                                Chương trình
                            </div>
                            <div class="tab-pane fade" id="dieu-khoan" role="tabpanel" aria-labelledby="nav-profile-tab">
                                Điều khoản
                            </div>
                            <div class="tab-pane fade" id="quy-dinh" role="tabpanel" aria-labelledby="nav-contact-tab">
                                Quy định
                            </div>
                            <div class="tab-pane fade" id="binh-luan" role="tabpanel" aria-labelledby="nav-contact-tab">
                                Bình luận
                            </div>
                        </div>
                    </div>
                    <!-- sidebar -->
                    <div id="shop_sidebar" class="col-lg-3 shop_sidebar">
                        <div class="widget widget_timkiem">
                            <div class="widget_title">
                                <h4>Tìm kiếm</h4>
                            </div>
                            <div class="widget_content">
                                <form action="" method="">
                                    <select name="nhomtour" class="form-control">
                                        <option value="">--- Nhóm tour ---</option>
                                        <option value="1">Trong nước</option>
                                        <option value="2">Nước ngoài</option>
                                    </select>
                                    <select name="noikhoihanh" class="form-control">
                                        <option value="">--- Nơi khởi hành ---</option>
                                        <option value="1">Hồ Chí Minh</option>
                                    </select>
                                    <select name="noiden" class="form-control">
                                        <option value="">--- Nơi đến ---</option>
                                        <option value="1">Cù Lao Chàm</option>
                                        <option value="2">Đà Lạt</option>
                                        <option value="3">Đà Nẵng</option>
                                    </select>
                                    <div class="text-center">
                                        <button type="submit">tìm kiếm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!---------------------->
                        <div class="widget widget_img">
                            <a href="#">
                                <img src="image/sibebar_chitiettour.jpg" alt="">
                            </a>
                        </div>
                        <!---------------------->
                        <div class="widget widget_tourkhuyenmai">
                            <div class="widget_title">
                                <h4>Tour khuyến mãi</h4>
                            </div>
                            <div class="widget_content">
                                <div class="product_single">
                                    <div class="product_single_inner">
                                        <a class="row" href="#">
                                            <div class="col-4 product_avt">
                                                <img src="image/ly-son.jpg" alt="">
                                            </div>
                                            <div class="col-8 product_text">
                                                <h3>LÝ SƠN 2N1Đ_KHỞI HÀNH HẰNG NGÀY</h3>
                                                <div class="amount">
                                                    <span>5.690.000₫</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---------------------->
                        <div class="widget widget_tourvuaxem">
                            <div class="widget_title">
                                <h4>Các tour vừa xem</h4>
                            </div>
                            <div class="widget_content">
                                <div class="product_single">
                                    <div class="product_single_inner">
                                        <a class="row" href="#">
                                            <div class="col-4 product_avt">
                                                <img src="image/ly-son.jpg" alt="">
                                            </div>
                                            <div class="col-8 product_text">
                                                <h3>LÝ SƠN 2N1Đ_KHỞI HÀNH HẰNG NGÀY</h3>
                                                <div class="amount">
                                                    <span>5.690.000₫</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="product_single">
                                    <div class="product_single_inner">
                                        <a class="row" href="#">
                                            <div class="col-4 product_avt">
                                                <img src="image/goi-ca-trich.jpg" alt="">
                                            </div>
                                            <div class="col-8 product_text">
                                                <h3>PHÚ QUỐC 3N2Đ - KHỞI HÀNH ĐỊNH KỲ</h3>
                                                <div class="amount">
                                                    <span>5.690.000₫</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---------------------->
                        <div class="widget widget_tourthongdung">
                            <div class="widget_title">
                                <h4>Các tour thông dụng</h4>
                            </div>
                            <div class="widget_content">
                                <div class="product_single">
                                    <div class="product_single_inner">
                                        <a class="row" href="#">
                                            <div class="col-4 product_avt">
                                                <img src="image/ly-son.jpg" alt="">
                                            </div>
                                            <div class="col-8 product_text">
                                                <h3>LÝ SƠN 2N1Đ_KHỞI HÀNH HẰNG NGÀY</h3>
                                                <div class="amount">
                                                    <span>5.690.000₫</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- button toggle sidebar -->
                    <a class="sidebar_toggle_btn" onclick="openSidebar()">
                        <i class="far fa-chevron-right"></i>
                    </a>
                    <!-- overlay on sidebar open -->
                    <div id="sidebar_overlay" class="toggled"></div>
                </div>
            </div>
            </div>
        </section>
    </main>

@endsection

@section('sidebarMobile')


@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

<script src="{{ asset('public/js/chitiettour.js') }}"></script>
@endpush