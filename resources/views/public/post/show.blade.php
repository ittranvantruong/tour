@extends('public.layouts.master')

@section('title', 'Chi tiết')

@push('css')
    <link href="{{ asset('public/css/baiviet.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')

<main id="baiviet">
        <!-- breadcrumbs -->
        <section class="shop_breadcrumbs">
            <div class="page-title shop-page-title">
                <div class="page-title-inner container">
                    <ul class="breadcrumbs">
                        <li><a href="#"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li class="active"><span>Những địa điểm du lịch Đà Nẵng hấp dẫn nhất</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- nội dung -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- bài viết -->
                    <div class="col-lg-9 show_posts">
                        <div class="row post_single">
                            <div class="col-12 post_header">
                                <div class="post_title">
                                    <h1>Những địa điểm du lịch Đà Nẵng hấp dẫn nhất</h1>
                                </div>
                                <ul class="posted_at">
                                    <li><i class="far fa-calendar-alt"></i> 28/08/2019</li>
                                    <li><a href="#"><i class="fas fa-user"></i> CÔNG TY TNHH LỮ HÀNH BALI TOURIST</a>
                                    </li>
                                    <li><a href="#"><i class="fas fa-comments"></i> 0 Bình luận</a></li>
                                </ul>
                            </div>
                            <div class="col-12 post_content">
                                <h5><em>1. Bãi biển Mỹ Khê</em></h5>
                                <p>Từng được được bình chọn là bãi biển xinh đẹp quyến rũ nhất hành tinh bởi tạp chí
                                    Forbes của Mỹ.
                                    Chỉ cách trung tâm thành phố Đà Nẵng khoảng 3 km, nhìn từ trên cao xuống, biển Mỹ
                                    Khê là một dải
                                    màu xanh mênh mông và khi đến nơi mới thấy vẻ đẹp bùng lên rực rỡ.
                                </p>
                                <p><strong>Bãi biển Mỹ Khê</strong>&nbsp;thu hút rất nhiều du khách bởi vẻ hoang sơ, bờ
                                    cát trắng mịn,
                                    sóng vỗ hiền hòa trong bầu không khí rất dịu mát và trong lành. Đến với Đà Nẵng du
                                    khách nên một
                                    lần đến đây để trải nghiệm một buổi sớm bình minh lấp lánh như, tỏa ra từ chân trời
                                    như một vùng
                                    hào quang và đắm mình trong dòng nước mát lạnh. Bạn có thể lựa chọn cho mình
                                    một&nbsp;khách sạn ở
                                    quận Sơn Trà&nbsp;để tiện di chuyển tới bãi biển xinh đẹp này nhé.
                                </p>
                                <img src="image/left_sidebar_banner.jpg" alt="">
                            </div>
                            <div class="col-12 likeshare_btn">
                                <div>
                                    <span>Chia sẻ:</span>
                                    <a href="#"><i class="fas fa-thumbs-up"></i> Thích</a>
                                    <a href="#">Chia sẻ</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 back_next_post">
                                <a href="#"><i class="far fa-long-arrow-alt-left"></i> Bài viết cũ hơn</a>
                                <a href="#">Bài viết mới hơn <i class="far fa-long-arrow-alt-right"></i></a>
                            </div>
                            <div class="col-12">
                                <div class="cus_divider"></div>
                            </div>
                        </div>
                        <!-- bài viết liên quan -->
                        <div class="row related_posts">
                            <div class="col-md-6">
                                <div class="title">
                                    <h4>Bài viết cùng danh mục:</h4>
                                </div>
                                <!---------------->
                                <div class="post_single">
                                    <div class="d-flex">
                                        <div class="post_avt">
                                            <a href="#"><img src="image/goi-ca-trich.jpg" alt=""></a>
                                        </div>
                                        <div class="product_text">
                                            <a href="#"><h3>Phố Biển Nha Trang - Ngỡ Ngàng Nét Đẹp Nên Thơ</h3></a>
                                            <ul class="posted_at">
                                                <li><i class="far fa-calendar-alt"></i> 28 tháng 8 2019</li>
                                                <li><a href="#"><i class="fas fa-comments"></i> 0</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!---------------->
                                <div class="post_single">
                                    <div class="d-flex">
                                        <div class="post_avt">
                                            <a href="#"><img src="image/hagiang2.jpg" alt=""></a>
                                        </div>
                                        <div class="product_text">
                                            <a href="#"><h3>Điểm du lịch Đà Lạt gắn với lịch sử – văn hóa tâm linh</h3></a>
                                            <ul class="posted_at">
                                                <li><i class="far fa-calendar-alt"></i> 28 tháng 8 2019</li>
                                                <li><a href="#"><i class="fas fa-comments"></i> 0</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cus_divider"></div>
                            </div>
                        </div>
                        <!-- bình luận -->
                        <div class="row">
                            <div class="col-12">
                                <div class="widget widget_comment">
                                    <div class="widget_title">
                                        <h4>Bình luận (0)</h4>
                                    </div>
                                    <div class="widget_content">
                                        
                                    </div>
                                </div>
                                <div class="widget widget_post_comment">
                                    <div class="widget_title">
                                        <h4>Viết bình luận</h4>
                                    </div>
                                    <div class="widget_content">
                                        <form action="" method="">
                                            <div class="cus_field">
                                                <label for="">Tên của bạn</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="cus_field">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="cus_field">
                                                <label for="">Viết bình luận</label>
                                                <textarea type="text" name="comment" class="form-control" rows="7"></textarea>
                                            </div>
                                            <button type="submit">Gửi bình luận</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-lg-none">
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
