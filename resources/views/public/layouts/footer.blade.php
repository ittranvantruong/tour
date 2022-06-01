<div style="padding-bottom: 20px;"></div>
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

    <a href="tel:{{ $settings['site_hotline'] }}" class="suntory-alo-phone suntory-alo-green" id=""
        style="right: 0px; bottom: 100px;">
        <div class="suntory-alo-ph-circle"></div>
        <div class="suntory-alo-ph-circle-fill"></div>
        <div class="suntory-alo-ph-img-circle"><i class="fa fa-phone"></i></div>
    </a>
    <a href="https://zalo.me/{{$settings['site_zalo']}}" class="" id="" style="position: fixed;
    right: 0px;
    display: block;
    bottom: 240px;
    height: 50px;
    /* width: 50px; */
    width: 95px;">
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
