<header>
    <section id="top_bar">
        <div class="container">
            <div class="row">
                <div class="col-8 col-md-4">
                    <div class="search">
                        {{-- <form action="{{ route('search.index') }}" method="get">
                            <div class="search_form">
                                <input type="search" id="form1" name="keyword" class="form-control" placeholder="Tìm kiếm ..." />
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form> --}}
                        <form action="{{ route('search.index') }}" method="get">
                            <input type="text" id="form1" name="keyword" required="">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-4 col-md-8 text-end">
                    <p class="m-0 text-white">
                        <span class="display_none_mobi"><i class="fa fa-map-marker"></i>
                            {{ $settings['site_address'] }}</span>
                        <span class=""><i class="fa fa-phone px-2"></i><span class="display_none_mobi">
                                Hotline:</span>
                            {{ $settings['site_hotline'] }}</span>
                        <span class="display_none_mobi"><i class="fa fa-envelope px-2"></i>
                            {{ $settings['site_email'] }}</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="container" id="nav_bar_desktop">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-------------------- Header Mobile ---------------------->
                <section id="header_main_mobi">
                    <div class="container p-1">
                        <div class="row">
                            <div class="col col-4">
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset($settings['site_logo']) }}" height="100px">
                                </a>
                            </div>
                            <div class="col col-8 align-self-center">
                                <a id="btn_main_menu" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasScrolling">
                                    <i class="fa fa-bars" aria-hidden="true" style="font-size: 20px"></i> MENU
                                </a>

                                <div class="offcanvas offcanvas-start" id="offcanvasScrolling" style="width: 80%;">
                                    <div class="offcanvas-body pe-0 ps-0">
                                        <div id="menu_mobile" class="active">
                                            <button type="button" id="close-menu" data-bs-dismiss="offcanvas"
                                                aria-label="Close">
                                                <span id="close-menu"><i class="fa fa-times"></i></span>
                                            </button>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('index') }}">Trang chủ</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('introduction.index') }}">Giới thiệu</a>
                                                    <button type="button" class="collapsible"><span
                                                            class="fa fa-angle-down"></span></button>
                                                    <div class="content">
                                                        <ul>
                                                            @foreach ($category_introduce as $item)
                                                                <li><a
                                                                        href="{{ route('introduction.category', $item->slug) }}">{{ $item->title }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ route('group.show', $group[0]['slug']) }}">{{ $group[0]['title'] }}</a>
                                                    <button type="button" class="collapsible"><span
                                                            class="fa fa-angle-down"></span></button>
                                                    <div class="content">
                                                        <ul>
                                                            @foreach ($place_domestic as $item)
                                                                <li><a
                                                                        href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ route('group.show', $group[1]['slug']) }}">{{ $group[1]['title'] }}</a>
                                                    <button type="button" class="collapsible"><span
                                                            class="fa fa-angle-down"></span></button>
                                                    <div class="content">
                                                        <ul>
                                                            @foreach ($place_abroad as $item)
                                                                <li><a
                                                                        href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ route('tour.index') }}">Danh mục du lịch</a>
                                                    <button type="button" class="collapsible"><span
                                                            class="fa fa-angle-down"></span></button>
                                                    <div class="content">
                                                        <ul>
                                                          
                                                            @foreach ($category_tour as $item)
                                                            <li><a href="{{ route('category.show', $item->slug) }}">{{ $item->title }}</a>
                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ route('tour.index') }}">Danh mục du lịch</a>
                                                    <button type="button" class="collapsible"><span
                                                            class="fa fa-angle-down"></span></button>
                                                    <div class="content">
                                                        <ul>
                                                          
                                                            @foreach ($category_tour as $item)
                                                            <li><a href="{{ route('category.show', $item->slug) }}">{{ $item->title }}</a>
                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a  href="{{ route('post.index') }}">Cẩm nang</a>
                                                </li>
                                                <li>
                                                    <a  href="{{ route('contact') }}">Liên hệ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-------------------- End Header Mobile ---------------------->

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="{{ route('index') }}" style="margin-right: auto;">
                        <img src="{{ asset($settings['site_logo']) }}" height="100px">
                    </a>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('introduction.index') }}">Giới thiệu</a>
                            <ul class="dropdown-menu">
                                @foreach ($category_introduce as $item)
                                    <li><a
                                            href="{{ route('introduction.category', $item->slug) }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link"
                                href="{{ route('group.show', $group[0]['slug']) }}">{{ $group[0]['title'] }}</a>
                            <ul class="dropdown-menu">
                                @foreach ($place_domestic as $item)
                                    <li><a href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link"
                                href="{{ route('group.show', $group[1]['slug']) }}">{{ $group[1]['title'] }}</a>
                            <ul class="dropdown-menu">
                                @foreach ($place_abroad as $item)
                                    <li><a href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('tour.index') }}">Danh mục du lịch</a>
                            <ul class="dropdown-menu">
                                @foreach ($category_tour as $item)
                                    <li><a href="{{ route('category.show', $item->slug) }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('post.index') }}">Cẩm nang</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('contact') }}">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

</header>
<!-- Start header -->
{{-- <header>
    <section id="header_top">
        <div class="container clearfix">
            <div class="row">
                <div class="col-12 col-md-9">
                    <ul class="p-0">
                        <li><a href="{{ route('index') }}">TRANG CHỦ</a></li>
                        <li><a href="{{ route('introduction') }}">GIỚI THIỆU</a></li>
                        <li><a href="{{ route('contact') }}">LIÊN HỆ</a></li>
                        <li><a href="tel:{{ $settings['site_hotline'] }}" style="border-right: none">HOTLINE:
                                {{ $settings['site_hotline'] }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-3">
                    <form action="{{ route('search.index') }}" method="get">
                        <div class="search_form">
                            <input type="search" id="form1" name="keyword" class="form-control"
                                placeholder="Tìm kiếm ..." />
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="header_main_desktop">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-4 text-center p-2">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset($settings['site_logo']) }}" height="100px">
                    </a>
                </div>
                <div class="col col-8">
                    <img src="{{ asset($settings['site_image_header']) }}" height="120px" width="100%">
                </div>
            </div>
        </div>
    </section>

    <section id="header_bottom" class="">
        <div class="container">
            <div class="container clearfix" style="padding: 2px">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <ul class="p-0" id="menu">
                            <li>
                                <a href="{{ route('group.show', $group[0]['slug']) }}">
                                    {{ $group[0]['title'] }}
                                    <span class="arrow arrow-down"></span>
                                </a>
                                <ul class="dropdown_menu">
                                    @foreach ($place_domestic as $item)
                                        <li><a
                                                href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('group.show', $group[1]['slug']) }}">
                                    {{ $group[1]['title'] }}
                                    <span class="arrow arrow-down"></span>
                                </a>
                                <ul class="dropdown_menu">
                                    @foreach ($place_abroad as $item)
                                        <li><a
                                                href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('tour.index') }}">
                                    Danh mục du lịch
                                    <span class="arrow arrow-down"></span>
                                </a>
                                <ul class="dropdown_menu">
                                    @foreach ($category_tour as $item)
                                        <li><a
                                                href="{{ route('category.show', $item->slug) }}">{{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('post.index') }}">Cẩm nang</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------------------- Header Mobile ---------------------->
    <section id="header_main_mobi">
        <div class="container p-1">
            <div class="row">
                <div class="col col-4 align-self-center">
                    <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling">
                        <i class="fa fa-bars" aria-hidden="true" style="font-size: 20px"></i>
                    </a>

                    <div class="offcanvas offcanvas-start" id="offcanvasScrolling" style="width: 80%;">
                        <div class="offcanvas-body">

                            <p>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $group[0]['slug'] }}">
                                        {{ $group[0]['title'] }}
                                    </button>
                                </h2>
                                <div id="{{ $group[0]['slug'] }}" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        @foreach ($place_domestic as $item)
                                            <p class="m-0"><a
                                                    href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            </p>
                            <p>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $group[1]['slug'] }}">
                                        {{ $group[1]['title'] }}
                                    </button>
                                </h2>
                                <div id="{{ $group[1]['slug'] }}" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        @foreach ($place_abroad as $item)
                                            <p class="m-0"><a
                                                    href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            </p>
                            <p><a href="{{ route('post.index') }}">Cẩm nang</a></p>
                        </div>
                    </div>
                </div>
                <div class="col col-4">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset(config('custom.images.logo')) }}" width="100%">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-------------------- End Header Mobile ---------------------->
</header>
<!-- End header --> --}}
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>
