<div class="post_single">
    <div class="d-flex">
        <div class="post_avt">
            <a href="{{ route('post.show', $item->slug) }}"><img src="{{ asset($item->avatar) }}" alt=""></a>
        </div>
        <div class="product_text">
            <a href="#">
                <h3>{{ $item->title }}</h3>
            </a>
            <ul class="posted_at">
                <li><i class="far fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($post->created_at)) }}</li>
            </ul>
        </div>
    </div>
</div>