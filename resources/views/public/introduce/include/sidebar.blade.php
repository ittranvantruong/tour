<div class="widget widget_baivietmoi">
    <div class="widget_title">
        <h4>Danh mục</h4>
    </div>
    <div class="widget_content">
        <ul class="category-menu">
            @foreach (App\Models\CategoryIntroduce::whereStatus(1)->orderBy('sort', 'asc')->get() as $item)
                <li><a
                    href="{{ route('introduction.category', ['category_slug' => $item->slug]) }}">{{$item->title}}</a></li>
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
        @foreach (App\Models\Introduce::whereStatus(1)->with('category')->latest()->take('5')->get()
    as $item)

            @include('public.introduce.include.post_new_grid', compact('item'))
        @endforeach
    </div>
</div>
<!----------------->
<div class="widget widget_baivietmoi">
    <div class="widget_title">
        <h4>Facebook</h4>
    </div>
    <div class="widget_content">
    </div>
</div>
<!----------------->
