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
                        <li><a href="{{ route('introduction.index') }}">Giới thiệu</a></li>
                        <li><a
                                href="{{ route('introduction.category', ['category_slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
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
                                    @include('public.introduce.include.post_related_grid', compact('item'))
                                @endforeach
                            </div>
                           
                        </div>
                        <!-- bình luận -->
                        
                    </div>
                    <!-- side bar -->
                    <div class="col-lg-3 post_page_sidebar">
                        @include('public.introduce.include.sidebar')

                    </div>
                </div>
        </section>
    </main>

@endsection

@section('sidebarMobile')


@endsection
