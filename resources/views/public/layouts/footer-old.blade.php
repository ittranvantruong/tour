<div style="padding-bottom: 20px;"></div>
<footer>
    <div class="container" id="top_footer">
        <div class="row">
            <div class="col-footer">
                <p class="footer-title">Bali tourist</p>
                <ul class="footer-menu">
                @foreach($posts as $item)
                    <li>
                        <a href="{{ route('post.show', ['category_slug' => $item->category()->value('slug'), 'post_slug' => $item->slug]) }}">
                            <strong>{{ $item->title }}</strong>
                            <br>Ngày đăng {{ date('d/m/Y', strtotime($item->created_at)) }}
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
            <div class="col-footer">
                <p class="footer-title">Nội địa</p>
                <ul class="footer-menu">
                    @foreach($place_domestic as $items)
                        @foreach($items as $item)
                        <li>
                            <a href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                        </li>
                        @endforeach
                    @endforeach
                    
                </ul>
            </div>
            <div class="col-footer">
                <p class="footer-title">Quốc tế</p>
                <ul class="footer-menu">
                    @foreach($place_abroad as $items)
                        @foreach($items as $item)
                        <li>
                            <a href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                        </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row clearfix">
            <div class="col-footer footer-info">
                <span>Số 614 Đường Minh Phụng, Phường 09, Quận 11, Tp. Hồ Chí Minh</span>
            </div>
            <div class="col-footer footer-info">
                <span class="phone-number">Tel:<a href="tel: 0123456789"><strong> (028) 3963 6869</strong></a></span>
            </div>
            <div class="col-footer footer-info">
                <span class="phone-number">Hotline:<a href="tel: 0123456789"><strong> 0907 458 176 (Ms Vàng)</strong></a></span>
            </div>
            <div class="col-footer footer-info">
                <span class="email-footer"><a href="mailto:luhanh@balitourist.com.vn">luhanh@balitourist.com.vn</a></span>
            </div>
        </div>
    </div>
    <a href="tel:{{ $settings['site_hotline'] }}" class="contact-btn contact-phone" id="" >
        <img src="{{ asset('public/images/phone.png') }}" height="50px" width="50px" alt="">
    </a>
    <a href="https://zalo.me/{{ $settings['site_zalo'] }}" class="contact-btn contact-zalo" id="" >
        <img src="{{ asset('public/images/zalo.png') }}" height="50px" width="50px" alt="">
    </a>
    <div onclick="topFunction()" id="gotoTop" class="fa fa-arrow-up" style="display: block;"></div>
</footer>

<div class="copyright container">
    <p class="chinhsach"><a href="#">Chính sách bảo mật thông tin</a> | 
    <a href="#">Hình thức thanh toán</a> | 
    <a href="#">Quy định chung</a></p>
    <p>Giấy chứng nhận đăng ký doanh nghiệp số 0310635296 do Sở Kế hoạch và Đầu tư TPHCM cấp.<br>Giấy Phép hoạt động trung tâm ngoại ngữ số 3068/QĐ-GDĐT-TC do Sở Giáo Dục và Đào Tạo TPHCM cấp.</p>
</div>

<footer style="background-color: #333;">
    <section class="container pt-3">
        <div class="row pb-3">
            <div class="col-12 col-md-6">
                <h6 class="text-center text-white text-uppercase">{{ $group[0]['title'] }}</h6>
                <div class="row">
                    @foreach ($place_domestic as $items)
                        <div class="col-4 col-md-3">
                            @foreach ($items as $item)
                                <a href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a><br>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-6 display_none_mobi">
                <h6 class="text-center text-white text-uppercase">{{ $group[1]['title'] }}</h6>
                <div class="row">
                    @foreach ($place_abroad as $items)
                        <div class="col-4 col-md-3">
                            @foreach ($items as $item)
                                <a href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a><br>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-3 pb-3">
                <h6 class="text-white text-uppercase">{{ $settings['site_name'] }}</h6>
                <p> </p>
                <p class="m-0"><strong>Địa chỉ:</strong> {{ $settings['site_address'] }}</p>
                <p class="m-0"><strong>Tel:</strong> {{ $settings['site_tel'] }}</p>
                <p class="m-0"><strong>Hotline:</strong> {{ $settings['site_hotline'] }}</p>
                <p class="m-0"><strong>Email:</strong> {{ $settings['site_email'] }}</p>
            </div>

            <div class="col-12 col-md-3 pb-3">
                <h6 class="text-white text-uppercase">THÔNG TIN</h6>
                <p> </p>
                <p class="m-0"><a href="{{ route('index') }}"><i class="fa fa-caret-right"
                            aria-hidden="true"></i> Trang chủ</a></p>
                <p class="m-0"><a href="{{ route('introduction.index') }}"><i class="fa fa-caret-right"
                            aria-hidden="true"></i> Giới thiệu</a></p>
                <p class="m-0"><a href="{{ route('tour.index') }}"><i class="fa fa-caret-right"
                            aria-hidden="true"></i> Sản phẩm</a></p>
                <p class="m-0"><a href="{{ route('contact') }}"><i class="fa fa-caret-right"
                            aria-hidden="true"></i> Liên hệ</a></p>
            </div>

            <div class="col-12 col-md-3 pb-3">
                <h6 class="text-white text-uppercase">BÀI VIẾT MỚI NHẤT</h6>
                <p> </p>
                @foreach ($posts as $item)
                    <p class="m-0 pb-1">
                        <a
                            href="{{ route('post.show', ['category_slug' => $item->category()->value('slug'), 'post_slug' => $item->slug]) }}"><strong>{{ $item->title }}</strong>
                            <br>Ngày đăng {{ date('d/m/Y', strtotime($item->created_at)) }}
                        </a>
                    </p>
                @endforeach
            </div>

            <div class="col-12 col-md-3 pb-3">
                <h6 class="text-white text-uppercase">FACEBOOK</h6>
            </div>
        </div>
    </section>
    <p class="copyright p-2 m-0 text-white text-center">&copy;Tour</p>

 
    <a href="tel:{{ $settings['site_hotline'] }}" class="contact-btn contact-phone" id="" >
        <img src="{{ asset('public/images/phone.png') }}" height="50px" width="50px" alt="">
    </a>
    <a href="https://zalo.me/{{ $settings['site_zalo'] }}" class="contact-btn contact-zalo" id="" >
        <img src="{{ asset('public/images/zalo.png') }}" height="50px" width="50px" alt="">
    </a>
    <div onclick="topFunction()" id="gotoTop" class="fa fa-arrow-up" style="display: block;"></div>
</footer>

@yield('sidebarMobile')

<script src="{{ asset('public/js/header.js') }}"></script>
<script src="{{ asset('public/js/all.js') }}"></script>

@stack('js')
</body>

</html>
