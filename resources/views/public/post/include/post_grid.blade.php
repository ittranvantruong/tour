<div class="row post_single">
    <div class="col-md-4">
        <div class="image-wrapper">
            <a
                href="{{ route('post.show', ['category_slug' => $item->category->slug, 'post_slug' => $item->slug]) }}">

                <img src="{{ asset($item->avatar) }}" alt="{{ $item->title }}">
            </a>
        </div>
    </div>
    <div class="col-md-7 d-flex justify-content-between flex-column">
        <div>
            <div class="post_desc">
                <a
                    href="{{ route('post.show', ['category_slug' => $item->category->slug, 'post_slug' => $item->slug]) }}">
                    <h2 class="post-title" title="{{ $item->title }}">{{ $item->title }}</h2>
                </a>
            </div>
            <ul class="posted_at">
                <li><i class="far fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($item->created_at)) }}</li>
                <li><i class="fas fa-certificate"></i> {{ $item->category->title }}</li>
                <li><i class="fas fa-comments"></i> 0 Bình luận</li>
            </ul>
        </div>
        <div class="read_continue">
            <a
                href="{{ route('post.show', ['category_slug' => $item->category->slug, 'post_slug' => $item->slug]) }}">Xem
                tiếp <i class="fas fa-angle-double-right"></i></a>
        </div>
    </div>
</div>
