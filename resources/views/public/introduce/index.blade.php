@extends('public.layouts.master')

@section('title', $title)

@push('css')
    <link href="{{ asset('public/css/category_post.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/pagination.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/post.css') }}" rel="stylesheet" type="text/css">

@endpush

@section('content')

    <main id="tintuc">
        <!-- breadcrumbs -->
        <section class="shop_breadcrumbs">
            <div class="page-title shop-page-title">
                <div class="page-title-inner container">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li><a href="{{ route('introduction.index') }}" class="active">Giới thiệu</a> </li>
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
                    <div class="col-lg-9 ">
                        {!! $content !!}
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

@push('js')
@endpush
