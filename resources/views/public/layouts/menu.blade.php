<!-- Start header -->
<header>
    <section id="header_top">
        <div class="container clearfix">
            <div class="row">
                <div class="col-12 col-md-9">
                    <ul class="p-0">
                        <li><a href="{{ route('index') }}">TRANG CHỦ</a></li>
                        <li><a href="{{ route('introduction') }}">GIỚI THIỆU</a></li>
                        <li><a href="{{ route('contact') }}">LIÊN HỆ</a></li>
                        <li><a href="tel:{{ $settings['site_hotline'] }}" style="border-right: none">HOTLINE: {{ $settings['site_hotline'] }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-3">
                    <form action="{{ route('search.index') }}" method="get">
                        <div class="search_form">
                            <input type="search" id="form1" name="keyword" class="form-control" placeholder="Tìm kiếm ..." />
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
                                    @foreach($place_domestic as $item)
                                    <li><a href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('group.show', $group[1]['slug']) }}">
                                    {{ $group[1]['title'] }}
                                    <span class="arrow arrow-down"></span>
                                </a>
                                <ul class="dropdown_menu">
                                    @foreach($place_abroad as $item)
                                    <li><a href="{{ route('place.show', $item->slug) }}">{{ $item->title }}</a></li>
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
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#{{ $group[0]['slug'] }}">
                                            {{ $group[0]['title'] }}
                                        </button>
                                    </h2>
                                    <div id="{{ $group[0]['slug'] }}" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            @foreach($place_domestic as $item)
                                            <p class="m-0"><a href="#">{{ $item->title }}</a></p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#{{ $group[1]['slug'] }}">
                                            {{ $group[1]['title'] }}
                                        </button>
                                    </h2>
                                    <div id="{{ $group[1]['slug'] }}" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            @foreach($place_abroad as $item)
                                            <p class="m-0"><a href="#">{{ $item->title }}</a></p>
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
<!-- End header -->