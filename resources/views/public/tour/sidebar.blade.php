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

            @include('public.tour.partials.entry-tour-vetical', ['data' => $tour_sale])

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
                @foreach($posts as $item)
                        <div class="row box_blog_img_left">
                            <div class="col-8 ps-0">
                                <p class="m-0 fw-bold">{{ $item->title }}</p>
                                <p class="m-0">{{ date('d/m/Y', strtotime($item->created_at)) }}</p>
                            </div>
                        </div>
                    </a>
                    <p class="m-2"> </p>
                @endforeach
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

            @include('public.tour.partials.entry-tour-vetical', ['data' => session()->get('tour_watched', [])])

        </div>
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