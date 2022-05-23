<div class="row related_posts">
    <div class="col-md-6">
        <div class="title">
            <h4>Bài viết cùng danh mục:</h4>
        </div>
        @foreach($related_posts as $item)
            @include('public.post.loop.single-related-post', ['item' => $item])
        @endforeach
    </div>
    <div class="col-12">
        <div class="cus_divider"></div>
    </div>
</div>