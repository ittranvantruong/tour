@extends('public.layouts.master')

@section('title', $title)

@push('css')

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
                    <div class="col">
                        {!! $content !!}
                    </div>
                </div>
            </div>
        </section>
</main>
@endsection

@push('js')

@endpush