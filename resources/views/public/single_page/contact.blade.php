@extends('public.layouts.master')

@section('title', $title)

@push('css')
    <link rel="stylesheet" href="{{ asset('public/lib/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset('public/lib/Parsley.js-2.9.2/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/contact.css') }}" rel="stylesheet">
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

        <section id="">
            <div class="container">
                <div id="form_lien_he">
                    {{-- <div class="row d-xs-none">
                    <div class="col-12 col-md-7">
                        <h4 class="section-title">Liên hệ</h4>
                    </div>
                    <div class="col-12 col-md-5">
                        <h4 class="section-title">Chúng tôi ở đây</h4>
                    </div>
                </div> --}}
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-md-7">
                            <form action="{{ route('contact.postContact') }}" method="post" data-parsley-validate>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ $message }}
                                    </div>
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group text-center">
                                            <label class="fw-bold">Chọn Tour quan tâm</label>
                                            <select name="tour_id"
                                                class="form-control {{ isset($tour) ? '' : 'select2' }}"
                                                {{ isset($tour) ? 'readonly' : '' }} id="" required
                                                data-parsley-required-message="Bắt buộc chọn Tour">
                                                @if (isset($tour))
                                                    <option value="{{ $tour->id }}" selected>{{ $tour->title }}
                                                    </option>
                                                @elseif(isset($tours))
                                                    @foreach ($tours as $item)
                                                        <option value="{{ $item->id }}" selected>{{ $item->title }}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="fw-bold">Họ và Tên của bạn</label>
                                            <input type="text" class="form-control" name="fullname" required
                                                data-parsley-required-message="Trường này không được bỏ trống">
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold">Số điện thoại</label>
                                            <input type="number" name="phone" class="form-control" required
                                                data-parsley-required-message="Trường này không được bỏ trống">
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold">Số lượng khách</label>
                                            <input type="number" name="amount_customer" class="form-control" required
                                                data-parsley-required-message="Trường này không được bỏ trống">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="fw-bold">Ngày tháng năm sinh</label>
                                            <input type="date" name="birthday" class="form-control" required
                                                data-parsley-required-message="Trường này không được bỏ trống">
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold">Email</label>
                                            <input type="email" name="email" class="form-control" required
                                                data-parsley-required-message="Trường này không được bỏ trống">
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold">Phương thức thanh toán</label>
                                            <select name="payment_method" class="form-control" id="payment_method"
                                                required data-parsley-required-message="Trường này không được bỏ trống">
                                                <option value="Chuyển khoản">Chuyển khoản</option>
                                                <option value="Tiền mặt">Tiền mặt</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="fw-bold">Nội dung</label>
                                            <textarea class="form-control" name="content"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary">Gửi thông tin</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-5 text-center">
                            <div class="info-area my-5">
                                <div class="logo mb-3">
                                    <img src="{{ asset($settings['site_logo']) }}" width="50%">
                                </div>
                                <ul class="info-company text-dark">
                                    <li><strong>Tên công ty:</strong> {{ $settings['site_name'] }}</li>
                                    <li><strong>Địa chỉ:</strong> {{ $settings['site_address'] }}</li>
                                    <li><strong>Số điện thoại:</strong> {{ $settings['site_tel'] }}</li>
                                    <li><strong>Hotline:</strong> {{ $settings['site_hotline'] }}</li>
                                    <li><strong>Email:</strong> {{ $settings['site_email'] }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="maps" class="pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="map-area">
                            {!! $settings['site_google_map'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection

@push('js')
    <script src="{{ asset('public/lib/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Chọn danh mục',
                allowClear: true,
                theme: "classic",
                width: '100%'
            });

        })
    </script>
@endpush
