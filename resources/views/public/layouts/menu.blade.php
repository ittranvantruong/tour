<!-- Start header -->
<header>
    <button class="btn btn-warning p-1 btn_mo_tab_phu display_none_desktop" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#tab_phu_tren_main">></button>
    <section id="header_top">
        <div class="container clearfix">
            <div class="row">
                <div class="col-12 col-md-9">
                    <ul class="p-0">
                        <li><a href="#">TRANG CHỦ</a></li>
                        <li><a href="#">GIỚI THIỆU</a></li>
                        <li><a href="#">TUYỂN DỤNG</a></li>
                        <li><a href="#">LIÊN HỆ</a></li>
                        <li><a href="#">ĐĂNG NHẬP</a></li>
                        <li><a href="tel: 0123456789" style="border-right: none">HOTLINE: 0907 458 176 (MS VÀNG)</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-3">
                    <div class="search_form">
                        <input type="search" id="form1" class="form-control" placeholder="Tìm kiếm ..." />
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="header_main_desktop">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-3 text-center p-2">
                    <img src="{{ asset(config('custom.images.logo')) }}" width="100%">
                </div>
                <div class="col col-9">
                    <img src="{{ asset('public/uploads/images/top_banner.jpeg') }}" width="100%">
                </div>
            </div>
        </div>
    </section>

    <section id="header_bottom">
        <div class="container">
            <div class="container clearfix" style="padding: 2px">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <ul class="p-0" id="menu">
                            <li>
                                <a href="javascript:void(0)">
                                    DL TRONG NƯỚC
                                    <span class="arrow arrow-down"></span>
                                </a>
                                <ul class="dropdown_menu">
                                    <li>
                                        <a href="javascript:void(0)">Viet nam</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Thai lan</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">DL Ngoài nước</a></li>
                            <li><a href="#">Tour du thuyền</a></li>
                            <li><a href="#">Các dịch vụ khác</a></li>
                            <li><a href="#">Tour free & easy</a></li>
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
                                            data-bs-toggle="collapse" data-bs-target="#acco_dl_trong_nuoc">
                                            <a>DL Trong nước</a>
                                        </button>
                                    </h2>
                                    <div id="acco_dl_trong_nuoc" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <p class="m-0"><a>Viet Nam 1</a></p>
                                            <p class="m-0"><a>Viet Nam 2</a></p>
                                            <p class="m-0"><a>Viet Nam 3</a></p>
                                            <p class="m-0"><a>Viet Nam 4</a></p>
                                            <p class="m-0"><a>Viet Nam 5</a></p>
                                        </div>
                                    </div>
                                </div>
                            </p>
                            <p><a href="#">DL Ngoài nước</a></p>
                            <p><a href="#">Tour du thuyền</a></p>
                            <p><a href="#">Các dịch vụ khác</a></p>
                            <p><a href="#">Tour free & easy</a></p>
                        </div>
                    </div>
                </div>
                <div class="col col-4">
                    <img src="{{ asset(config('custom.images.logo')) }}" width="100%">
                </div>
            </div>
        </div>
    </section>
    <!-------------------- End Header Mobile ---------------------->
</header>
<!-- End header -->