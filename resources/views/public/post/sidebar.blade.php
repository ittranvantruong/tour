<div class="col-lg-3 post_page_sidebar">
    <div class="widget widget_baivietmoi">
        <div class="widget_title">
            <h4>Danh mục</h4>
        </div>
        <div class="widget_content">
            <ul>
                @foreach ($category as $item)
                    <li><a href="{{ route('post.category.show', $item->slug) }}">{{ $item->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!----------------->
    <div class="widget widget_baivietmoi">
        <div class="widget_title">
            <h4>Bài viết mới nhất</h4>
        </div>
        <div class="widget_content">
            @foreach($posts as $item)
            <div class="post_single">
                <a href="{{ route('post.show', $item->slug) }}" class="d-flex">
                    <div class="post_avt">
                        <img src="{{  asset($item->avatar) }}" alt="">
                    </div>
                    <div class="product_text">
                        <h3>{{ $item->title }}</h3>
                        <ul class="posted_at">
                            <li>{{ date('d/m/Y', strtotime($item->created_at)) }}</li>
                        </ul>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <!----------------->
    
</div>