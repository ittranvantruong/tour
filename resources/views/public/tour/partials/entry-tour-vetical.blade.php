@foreach ($data as $item)
<a class="row" href="{{ route('tour.show', $item->slug) }}">
    <div class="col-4 product_avt">
        <img src="{{ asset($item->avatar) }}" alt="">
    </div>
    <div class="col-8 product_text">
        <h3>{{ $item->title }}</h3>
        <div class="amount">
            <span>{{ number_format($item->price_promotion) }}</span>
            <del>{{ number_format($item->price) }}</del>
        </div>
    </div>
</a>
@endforeach