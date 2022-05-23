@extends('public.layouts.master')

@section('title', $title)

@push('css')
    <link href="{{ asset('public/css/tintuc.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')

<main id="tintuc">
        <!-- breadcrumbs -->
        <section class="shop_breadcrumbs">
            <div class="page-title shop-page-title">
                <div class="page-title-inner container">
                    <ul class="breadcrumbs">
                        <li><a href="#"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li class="active"><span>{{ $title }}</span>
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
                        
                        @foreach ($posts as $item)
                            @include('public.post.loop.single-post', ['item' => $item])
                        @endforeach

                        {{ $posts->appends(request()->all())->links() }}
                    </div>
                    <!-- side bar -->
                    @include('public.post.sidebar')
                </div>
        </section>
    </main>

@endsection

@section('sidebarMobile')


@endsection

@push('js')

@endpush