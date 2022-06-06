
<div style="padding-bottom: 20px;"></div>
<footer>
    <div class="container" id="top_footer">
        <div class="row">
            <div class="col-footer">
                <p class="footer-title">{{ $settings['site_name'] }}</p>
                <ul class="footer-menu">
                @foreach($posts as $item)
                    <li>
                        <a href="{{ route('post.show', $item->slug) }}">
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
                <span>{{ $settings['site_address'] }}</span>
            </div>
            <div class="col-footer footer-info">
                <span class="phone-number">Tel:<a href="tel: {{ $settings['site_tel'] }}"><strong> {{ $settings['site_tel'] }}</strong></a></span>
            </div>
            <div class="col-footer footer-info">
                <span class="phone-number">Hotline:<a href="tel: {{ $settings['site_hotline'] }}"><strong> {{ $settings['site_hotline'] }}</strong></a></span>
            </div>
            <div class="col-footer footer-info">
                <span class="email-footer"><a href="mailto:{{ $settings['site_email'] }}">{{ $settings['site_email'] }}</a></span>
            </div>
        </div>
    </div>
    <a href="tel:{{ $settings['site_hotline'] }}" class="suntory-alo-phone suntory-alo-green" id="" style="left: 0px; bottom: 0px;">
        <div class="suntory-alo-ph-circle"></div>
        <div class="suntory-alo-ph-circle-fill"></div>
        <div class="suntory-alo-ph-img-circle"><i class="fa fa-phone"></i></div>
    </a>

    <div  onclick="topFunction()" id="gotoTop" class="fa fa-arrow-up" style="display: block;"></div>
</footer>

<div class="copyright container">
    <p class="chinhsach"><a href="#">Chính sách bảo mật thông tin</a> | 
    <a href="#">Hình thức thanh toán</a> | 
    <a href="#">Quy định chung</a></p>
    <p>Giấy chứng nhận đăng ký doanh nghiệp số 0310635296 do Sở Kế hoạch và Đầu tư TPHCM cấp.<br>Giấy Phép hoạt động trung tâm ngoại ngữ số 3068/QĐ-GDĐT-TC do Sở Giáo Dục và Đào Tạo TPHCM cấp.</p>
</div>



@yield('sidebarMobile')

<script src="{{ asset('public/js/header.js') }}"></script>
<script src="{{ asset('public/js/all.js') }}"></script>

@stack('js')      
    </body>
</html>