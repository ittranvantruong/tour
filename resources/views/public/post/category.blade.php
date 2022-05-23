@extends('public.layouts.master')

@section('title', 'Chi tiết')

@push('css')
    <link href="{{ asset('public/css/category_post.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')

    <main id="tintuc">
        <!-- breadcrumbs -->
        <section class="shop_breadcrumbs">
            <div class="page-title shop-page-title">
                <div class="page-title-inner container">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li><a href="{{ route('post.index')}}">Tin tức</a> </li>
                        <li class="active"><span>{{ $category->title }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- nội dung -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- tổng hợp tin tức -->
                    <div class="col-lg-9 show_posts">
                        @foreach ($category->posts as $item)
                            @include('public.post.include.post_grid', compact('item'))
                        @endforeach
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

@push('js')
@endpush
