<div class="row post_single">
    <div class="col-md-4">
        <img src="{{  asset($item->avatar) }}" alt="">
    </div>
    <div class="col-md-7">
        <div class="post_desc">
            <a href="{{ route('post.show', $item->slug) }}">
                <h2>{{ $item->title }}</h2>
            </a>
        </div>
        <ul class="posted_at">
            <li><i class="far fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($item->created_at)) }}</li>
            <!-- <li><i class="fas fa-user"></i> CÔNG TY TNHH LỮ HÀNH BALI TOURIST</li>
            <li><a href="#"><i class="fas fa-comments"></i> 0 Bình luận</a></li> -->
        </ul>
        <div class="read_continue">
            <a href="{{ route('post.show', $item->slug) }}">Xem tiếp</a>
        </div>
    </div>
    <div class="col-11">
        <div class="cus_divider"></div>
    </div>
</div>