<div style="padding-bottom: 20px;"></div>
<footer style="background-color: #333;">
    <section class="container pt-3">
        <div class="row pb-3">
            <div class="col-12 col-md-6">
                <h6 class="text-center text-white text-uppercase">TRONG NƯỚC</h6>
                <div class="row">
                    <div class="col-4 col-md-3">
                        <a href="#">Cù Lao Chàm</a><br>
                        <a href="#">Hà Giang</a><br>
                        <a href="#">Huế</a><br>
                        <a href="#">Tràn An</a>
                    </div>
                    <div class="col-4 col-md-3">
                        <a href="#">Đà Lạt</a><br>
                        <a href="#">Hạ Long</a><br>
                        <a href="#">Ninh Chữ</a><br>
                    </div>
                    <div class="col-4 col-md-3">
                        <a href="#">Đà Nẵng</a><br>
                        <a href="#">Hà Nội</a><br>
                        <a href="#">Sa Pa</a><br>
                    </div>
                    <div class="col-4 col-md-3 display_none_mobi">
                        <a href="#">Fansipan</a><br>
                        <a href="#">Hội An</a><br>
                        <a href="#">Sa Pa</a><br>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 display_none_mobi">
                <h6 class="text-center text-white text-uppercase">NGOÀI NƯỚC</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-3 pb-3">
                <h6 class="text-white text-uppercase">BALI TOURIST</h6>
                <p> </p>
                <p class="m-0"><strong>Địa chỉ:</strong> Số 614 Đường Minh Phụng, Phường 09, Quận 11, Tp. Hồ Chí Minh</p>
                <p class="m-0"><strong>Tel:</strong> (028) 3963 6869</p>
                <p class="m-0"><strong>Hotline:</strong> 0907 458 176 (Ms Vàng)</p>
                <p class="m-0"><strong>Email:</strong> luhanh@balitourist.com.vn</p>
            </div>

            <div class="col-12 col-md-3 pb-3">
                <h6 class="text-white text-uppercase">THÔNG TIN</h6>
                <p> </p>
                <p class="m-0"><a href="/"><i class="fa fa-caret-right" aria-hidden="true"></i> Trang chủ</a></p>
                <p class="m-0"><a href="/"><i class="fa fa-caret-right" aria-hidden="true"></i> Giới thiệu</a></p>
                <p class="m-0"><a href="/"><i class="fa fa-caret-right" aria-hidden="true"></i> Sản phẩm</a></p>
                <p class="m-0"><a href="/"><i class="fa fa-caret-right" aria-hidden="true"></i> Liên hệ</a></p>
            </div>

            <div class="col-12 col-md-3 pb-3">
                <h6 class="text-white text-uppercase">BÀI VIẾT MỚI NHẤT</h6>
                <p> </p>
                <p class="m-0 pb-1">
                    <a href="/"><strong>Những địa điểm du lịch Đà Nẵng hấp dẫn nhất</strong>
                        <br>Ngày đăng 08/28/2019
                    </a>
                </p>
                <p class="m-0">
                    <a href="/"><strong>Những địa điểm du lịch Đà Nẵng hấp dẫn nhất</strong>
                        <br>Ngày đăng 08/28/2019
                    </a>
                </p>
            </div>

            <div class="col-12 col-md-3 pb-3">
                <h6 class="text-white text-uppercase">FACEBOOK</h6>
            </div>
        </div>
    </section>
    <p class="copyright p-2 m-0 text-white text-center">&copy;MEVIVU</p>

    <a href="tel:0123 456 789 (MR. RIDDLER)" class="suntory-alo-phone suntory-alo-green" id="" style="left: 0px; bottom: 0px;">
        <div class="suntory-alo-ph-circle"></div>
        <div class="suntory-alo-ph-circle-fill"></div>
        <div class="suntory-alo-ph-img-circle"><i class="fa fa-phone"></i></div>
    </a>

    <div  onclick="topFunction()" id="gotoTop" class="fa fa-arrow-up" style="display: block;"></div>
</footer>

@yield('sidebarMobile')

<script src="{{ asset('public/js/header.js') }}"></script>

@stack('js')
<script>
    //Get the button
    var mybutton = document.getElementById("gotoTop");
    
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>        
    </body>
</html>