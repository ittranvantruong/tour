@extends('public.layouts.master')

@section('title', $tour->title)

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
                        <li class="active"><span>{{ $tour->title }}</span>
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
                            <img src="{{ asset($tour->avatar) }}">
                            @foreach($tour->file as $file)
                                <img src="{{ asset($file->path) }}">
                            @endforeach
                        </div>
                        @if($tour->price_promotion)
                        <div class="sale_tag">SALE</div>
                        @endif
                    </div>
                    <div class="col-lg-6 product_desc">
                        <div class="name_tour">
                            <h1>HÀ GIANG - CHÈO THUYỀN SÔNG NHO QUẾ 4N3Đ - KH: THỨ 5 HÀNG TUẦN</h1>
                        </div>
                        <div class="amount">
                        @if($tour->price_promotion)
                            <span>{{ number_format($tour->price_promotion) }}₫</span>
                            <del>{{ number_format($tour->price) }}₫</del>
                        @else
                        <span>{{ number_format($tour->price) }}₫</span>
                        @endif
                        </div>
                        <div>Mã tour: {{ $tour->code }}</div>
                        <hr />
                        <div class="thongtin_tour row">
                            <div class="col-md-6">
                                <strong>Nơi khởi hành</strong>
                                <span><a href="{{ route('search.index', ['sel_place_from' => optional($tour->get_place_from)->id]) }}">{{ optional($tour->get_place_from)->title }}</a></span>
                            </div>
                            <div class="col-md-6">
                                <strong>Nơi đến</strong>
                                <span>
                                    @foreach($tour->place_to as $item)
                                    <a href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                                    @if(!$loop->last)
                                    ,
                                    @endif
                                    @endforeach
                                </span>
                            </div>
                        </div>
                        <hr />
                        <div class="row lienhe_box">
                            <div class="col-md-6">
                                <a href="{{ route('contact') }}"><i class="fab fa-telegram-plane"></i>Liên hệ</a>
                            </div>
                            <div class="col-md-6">
                                <a href="tel:{{ $setting['site_hotline'] }}"><i class="fas fa-phone-alt"></i>{{ $setting['site_hotline'] }}</a>
                            </div>
                        </div>
                        <hr />
                        <div class="tags_lienquan">
                            <div>
                                Tags:
                                <a class="tags" href="{{ route('search.index', ['sel_place_from' => optional($tour->get_place_from)->id]) }}" rel="tag">
                                    <span></span>{{ optional($tour->get_place_from)->title }}
                                </a>
                                @foreach($tour->place_to as $item)
                                <a class="tags" href="{{ route('place.show', $item->slug) }}" rel="tag">
                                    <span></span>{{ $item->title }}
                                </a>
                                @endforeach
                                
                            </div>
                        </div>
                        <!-- <div class="likeshare_btn">
                            <div>
                                <a href="#"><i class="fas fa-thumbs-up"></i> Thích</a>
                                <a href="#">Chia sẻ</a>
                            </div>
                        </div> -->
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
                                <!-- <a class="nav-item nav-link" data-bs-toggle="tab" href="#binh-luan"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">Bình luận</a> -->
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
                                        <!-- <a class="nav-item nav-link" data-bs-toggle="tab" href="#binh-luan" onclick="changeTabTitle('Bình luận')"
                                            role="tab" aria-controls="nav-contact" aria-selected="false">Bình luận</a> -->
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="chuong-trinh" role="tabpanel" aria-labelledby="nav-home-tab">
                                {!! $tour->description !!}
                            </div>
                            <div class="tab-pane fade" id="dieu-khoan" role="tabpanel" aria-labelledby="nav-profile-tab">
                            {!! $tour->term !!}
                            </div>
                            <div class="tab-pane fade" id="quy-dinh" role="tabpanel" aria-labelledby="nav-contact-tab">
                            {!! $tour->regulation !!}
                            </div>
                            <!-- <div class="tab-pane fade" id="binh-luan" role="tabpanel" aria-labelledby="nav-contact-tab">
                                Bình luận
                            </div> -->
                        </div>
                    </div>
                    <!-- sidebar -->
                    @include('public.tour.sidebar')
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