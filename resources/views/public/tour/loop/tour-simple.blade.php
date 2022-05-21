<div class="col-xl-3 col-md-4 col-6 product_single on_sale">
    <div class="product_single_inner">
        <a href="{{ route('tour.show', $item->slug) }}">
            <div class="product_avt">
                <img src="{{ asset($item->avatar) }}" alt="">
                @if($item->price_promotion)
                    <div class="sale_tag">SALE</div>
                @endif
            </div>
            <div class="product_text">
                <h3>{{ $item->title }}</h3>
                <div class="amount">
                    @if($item->price_promotion)
                    <span>{{ number_format($item->price_promotion) }}₫</span>
                    <del>{{ number_format($item->price) }}₫</del>
                    @else
                    <span>{{ number_format($item->price) }}₫</span>
                    @endif
                </div>
            </div>
        </a>
        <div class="buy_now_btn">
            <a href="#datngay" class=""><span>Đặt ngay</span><i class="far fa-chevron-right"></i></a>
        </div>
    </div>
</div>