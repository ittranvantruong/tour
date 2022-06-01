<div class="post_single">
    <div class="row">
        <div class="col-4">
            <div class="image-wrapper">
                <img src="{{ asset($item->avatar) }}" alt="{{ $item->title }}">
            </div>
        </div>
        <div class="col-8 product_text">
            <a href="{{route('post.show', ['category_slug' => $item->category->slug, 'post_slug' => $item->slug])}}">
                <h3 class="post-related-title" title="{{$item->title}}">{{$item->title}}</h3>
            </a>
            <ul class="posted_at">
                <li><i class="far fa-calendar-alt"></i> {{date('d/m/Y', strtotime($item->created_at))}}</li>
            </ul>
        </div>
    </div>
</div>