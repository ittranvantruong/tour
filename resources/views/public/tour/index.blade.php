@extends('public.layouts.master')

@section('title', $title)

@push('css')
<link href="{{ asset('public/css/loaitour.css') }}" rel="stylesheet" type="text/css">

@endpush

@section('content')
<main id="loaitour">
        <!-- breadcrumbs -->
        <section class="shop_breadcrumbs">
            <div class="page-title shop-page-title">
                <div class="page-title-inner container">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li class="active"><span>{{ $title }}</span></li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- nội dung -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- sidebar -->
                    @include('public.tour.sidebar')
                    <!-- nội dung tour -->
                    <div class="col-lg-9 noidungtour">
                        <div class="title_and_serachform">
                            <div class="cat_title">
                                <h1>{{ $title }}</h1>
                            </div>
                            @include('public.tour.sort')
                        </div>

                        @include('public.tour.partials.entry-tour', ['data' => $tours])

                        {{ $tours->appends(request()->all())->links() }}

                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

@endsection

@section('sidebarMobile')


@endsection

@push('js')
<script src="{{ asset('public/js/loaitour.js') }}"></script>
@endpush