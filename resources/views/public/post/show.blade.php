@extends('public.layouts.master')

@section('title', $post->title)

@push('css')
    <link href="{{ asset('public/css/post.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')

    <main id="baiviet">
        <!-- breadcrumbs -->
        <section class="shop_breadcrumbs">
            <div class="page-title shop-page-title">
                <div class="page-title-inner container">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li><a href="{{ route('post.index') }}">Cẩm nang du lịch</a></li>
                        <li><a
                                href="{{ route('post.category', ['category_slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                        </li>
                        <li class="active"><span>{{ $post->title }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- nội dung -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- bài viết -->
                    <div class="col-lg-9 show_posts">
                        <div class="row post_single">
                            <div class="col-12 post_header">
                                <div class="post_title">
                                    <h1>{{ $post->title }}</h1>
                                </div>
                                <ul class="posted_at">
                                    <li><i class="far fa-calendar-alt"></i>
                                        {{ date('d/m/Y', strtotime($post->created_at)) }}
                                    </li>
                                    <li><a
                                            href="{{ route('post.category', ['category_slug' => $post->category->slug]) }}"><i
                                                class="fas fa-user"></i> {{ $post->category->title }}</a></li>
                                    </li>
                                    <li><a href="#comment-area"><i class="fas fa-comments"></i> {{$post->comment()->count()}} Bình luận</a></li>
                                </ul>
                            </div>
                            <div class="col-12 post_content">
                                {!! $post->content !!}
                            </div>
                            {{-- <div class="col-12 likeshare_btn">
                                <div>
                                    <span>Chia sẻ:</span>
                                    <a href="#"><i class="fas fa-thumbs-up"></i> Thích</a>
                                    <a href="#">Chia sẻ</a>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="row">
                            <div class="col-12 back_next_post">
                                <a href="#"><i class="far fa-long-arrow-alt-left"></i> Bài viết cũ hơn</a>
                                <a href="#">Bài viết mới hơn <i class="far fa-long-arrow-alt-right"></i></a>
                            </div>
                            <div class="col-12">
                                <div class="cus_divider"></div>
                            </div>

                        </div> --}}

                        <!-- bài viết liên quan -->
                        <div class="row related_posts">
                            <div class="col-md-6">
                                <div class="title">
                                    <h4>Bài viết cùng danh mục:</h4>
                                </div>
                                @foreach ($post_related as $item)
                                    @include('public.post.include.post_related_grid', compact('item'))
                                @endforeach
                            </div>
                            <div class="col-12">
                                <div class="cus_divider"></div>
                            </div>
                        </div>
                        <!-- bình luận -->
                        <div id="comment-area" class="row">
                            <div class="col-12">
                                <div class="widget widget_comment">
                                    <div class="widget_title">
                                        <h4>Bình luận ({{ $post->comment()->count() }})</h4>
                                    </div>
                                    <div class="widget_content">
                                        @foreach ($post->comment()->latest()->get() as $item)
                                            <div class="comment-list pt-1 pb-1">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-1">
                                                        <img class="w-100"
                                                            src="{{ asset('public/images/panda.png') }}" alt="">
                                                    </div>
                                                    <div class="col-11">
                                                        <p class="m-0">{{$item->name}} <sup>({{date('d/m/Y H:i')}})</sup></p>
                                                        <p class="m-0"><small>{{$item->content}}</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="widget widget_post_comment">
                                    <div class="widget_title">
                                        <h4>Viết bình luận</h4>
                                    </div>
                                    <div class="widget_content">
                                        @if ($errors->any())
                                            <ul>
                                                @foreach ($errors->all() as $val)
                                                    <li>{{ $val }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                {{ $message }}
                                            </div>
                                        @endif
                                        <form action="{{ route('post.postComment') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <div class="cus_field">
                                                <label for="">Tên của bạn</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="cus_field">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="cus_field">
                                                <label for="">Viết bình luận</label>
                                                <textarea type="text" name="content" class="form-control" rows="7"></textarea>
                                            </div>
                                            <button type="submit">Gửi bình luận</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-lg-none">
                                <div class="cus_divider"></div>
                            </div>
                        </div>
                    </div>
                    <!-- side bar -->
                    <div class="col-lg-3 post_page_sidebar">
                        @include('public.post.include.sidebar')

                    </div>
                </div>
        </section>
    </main>

@endsection

@section('sidebarMobile')


@endsection
