<div id="shop_sidebar" class="col-12 col-md-3 shop_sidebar">
    <div id="box_main_side">
        <div class="side_box_title">TOUR KHUYẾN MÃI</div>
        <div class="content_box_title">Chưa có khuyến mãi</div>
    </div>
    <div class="pb-2"></div>
    <div id="box_main_side">
        <div class="side_box_title text-uppercase">Cẩm nang du lịch</div>
        <div class="content_box_title">
            @foreach($posts as $item)
            @if($loop->first)
            <div class="box_blog_text">
                <a href="#">
                    <img src="{{ asset($item->avatar) }}" width="100%" height="160px">
                    <div class="bottom-left">
                        <span class="fw-bold">{{ $item->title }}</span>
                        <br>{{ date('d/m/Y', strtotime($item->created_at)) }}
                    </div>
                </a>
            </div>
            @else
            <p class="m-2"> </p>
            <a href="#" style="text-decoration: none;">
                <div class="row box_blog_img_left">
                    <div class="col-4">
                        <img src="{{ asset($item->avatar) }}" width="100%" height="50px">
                    </div>
                    <div class="col-8 ps-0">
                        <p class="m-0 fw-bold">{{ $item->title }}</p>
                        <p class="m-0">{{ date('d/m/Y', strtotime($item->created_at)) }}</p>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
        </div>
    </div>
    <!-- Văn hóa, ẩm thực tabs -->
    <div class="pb-2"></div>
    <div id="box_main_side">
        <div class="side_box_title text-uppercase">Văn hóa, ẩm thực</div>
        <div class="content_box_title">
        @foreach($post_category as $item)
            <a href="#" style="text-decoration: none;">
                <div class="row box_blog_img_left">
                    <div class="col-4">
                        <img src="{{ asset($item->avatar) }}" width="100%" height="50px">
                    </div>
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

    <!-- KHỞI HÀNH TỪ -->
    <div class="pb-2"></div>
    <div id="box_main_side">
        <div class="side_box_title">KHỞI HÀNH TỪ</div>
        @foreach($place_from as $item)
        <div class="content_box_title">
            <a href="{{ route('search.index', ['sel_place_from' => $item->id]) }}">{{ $item->title }}</a>
        </div>
        @endforeach
    </div>
</div>
<!-- button toggle sidebar -->
<a class="sidebar_toggle_btn" onclick="openSidebar()">
    <i class="far fa-chevron-right"></i>
</a>
<!-- overlay on sidebar open -->
<div id="sidebar_overlay" class="toggled"></div>