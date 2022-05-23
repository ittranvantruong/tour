@extends('public.layouts.master')

@section('title', $post->title)

@push('css')
    <link href="{{ asset('public/css/baiviet.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')

<main id="baiviet">
        <!-- breadcrumbs -->
        <section class="shop_breadcrumbs">
            <div class="page-title shop-page-title">
                <div class="page-title-inner container">
                    <ul class="breadcrumbs">
                        <li><a href="#"><i class="fas fa-home"></i>Trang chủ</a></li>
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
                                    <li><i class="far fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($post->created_at)) }}</li>
                                </ul>
                            </div>
                            <div class="col-12 post_content">
                                {!! $post->content !!}
                            </div>

                        </div>

                        <!-- bài viết liên quan -->
                        @include('public.post.partials.entry-related-post', ['related_posts' => $related_posts])
                        
                    </div>
                    <!-- side bar -->
                    @include('public.post.sidebar')
                </div>
        </section>
    </main>

@endsection

@section('sidebarMobile')


@endsection
