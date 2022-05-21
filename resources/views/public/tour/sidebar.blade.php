<div id="shop_sidebar" class="col-lg-3 shop_sidebar">
    <div class="widget widget_timkiem">
        <div class="widget_title">
            <h4>Tìm kiếm</h4>
        </div>
        <div class="widget_content">
            <form action="{{ route('search.index') }}" method="get">
                <select name="sel_group_tour" class="form-control">
                    <option value="">--- Nhóm tour ---</option>
                    @foreach($group as $key => $item)
                    <option value="{{ $key }}">{{ $item['title'] }}</option>
                    @endforeach
                </select>
                <select name="sel_place_from_tour" class="form-control">
                    <option value="">--- Nơi khởi hành ---</option>
                </select>
                <select name="sel_place_to_tour" class="form-control">
                    <option value="">--- Nơi đến ---</option>
                </select>
                <div class="text-center">
                    <button type="submit">tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <!---------------------->
    <div class="widget widget_tourkhuyenmai">
        <div class="widget_title">
            <h4>Tour khuyến mãi</h4>
        </div>
        <div class="widget_content">
            <div class="product_single">
                <div class="product_single_inner">
                    @include('public.tour.partials.entry-tour-vetical', ['data' => $tour_sale])
                </div>
            </div>
        </div>
    </div>
    <!---------------------->
    <div class="widget widget_tinnoibat">
        <div class="widget_title">
            <h4>Tin nổi bật</h4>
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
            <h4>Tour vừa xem</h4>
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
    <div class="widget widget_img">
        <a href="#">
            <img src="image/left_sidebar_banner.jpg" alt="">
        </a>
    </div>
</div>
<!-- button toggle sidebar -->
<a class="sidebar_toggle_btn" onclick="openSidebar()">
    <i class="far fa-chevron-right"></i>
</a>
<!-- overlay on sidebar open -->
<div id="sidebar_overlay" class="toggled"></div>
<script>
    var routeRenderPlaceToGroup = "{{ route('ajax.get.place.to.group') }}", 
    nameRenderPlaceFrom = 'Nơi khởi hành', nameRenderPlaceTo = 'Nơi đến';
</script>
<script src="{{ asset('public/js/search.js') }}"></script>