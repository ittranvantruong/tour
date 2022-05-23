@extends('public.layouts.master')

@section('title', $title)

@push('css')

@endpush

@section('content')

<main class="pt-3 pb-3">
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
    <section id="maps" class="pb-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! $settings['site_google_map'] !!}
                </div>
            </div>
        </div>
    </section>

    <section id="form_lien_he">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <h4>Liên hệ</h4>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label class="fw-bold">Họ và Tên của bạn *</label>
                            <input type="text" class="form-control">
                            <p></p>

                            <label class="fw-bold">Số điện thoại * </label>
                            <input type="text" class="form-control">
                            <p></p>
                            
                            <label class="fw-bold">Số lượng khách *</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="fw-bold">Ngày tháng năm sinh *</label>
                            <input type="text" class="form-control">
                            <p></p>

                            <label class="fw-bold">Email *</label>
                            <input type="text" class="form-control">
                            <p></p>
                            
                            <label class="fw-bold">Phương thức thanh toán *</label>
                            <input type="text" class="form-control">
                        </div>
                        <p></p>
                        <div class="col-12">
                            <label class="fw-bold">Nội dung</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-1 pb-3"></div>
                <div class="col-12 col-md-3">
                    <h4>Chúng tôi ở đây</h4>
                    <p class="m-0"><strong>Tên công ty:</strong> {{ $settings['site_name'] }}</p>
                    <p class="m-0"><strong>Địa chỉ:</strong> {{ $settings['site_address'] }}</p>
                    <p class="m-0"><strong>Tel:</strong> {{ $settings['site_tel'] }} </p>
                    <p class="m-0"><strong>Hotline:</strong> {{ $settings['site_hotline'] }}</p>
                    <p class="m-0"><strong>Email:</strong> {{ $settings['site_email'] }}</p>
                    <!-- <p class="m-0"><strong>Web:</strong> balitourist.com.vn</p> -->
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@push('js')

@endpush