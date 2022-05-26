@extends('admin.layouts.master')

@section('title', 'Xem liên hệ')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
@endpush
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <form id="formAdd" action="{{ route('admin.lien-he.update', $order->id) }}" method="post" data-parsley-validate>
            {{ method_field('put') }}
            @csrf
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Xem liên hệ</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <ul>
                                        <li>Họ tên: <b>{{ $order->fullname }}</b></li>
                                        <li>Sinh nhật: <b>{{ date('d/m/Y', strtotime($order->birthday)) }}</b></li>
                                        <li>Số điện thoại: <b><a
                                                    href="tel:{{ $order->phone }}">{{ $order->phone }}</a></b>
                                        </li>
                                        <li>Email: <b><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul>
                                        <li>Tour: <b></b><a
                                                href="{{ route('admin.tour.edit', $order->tour->id) }}">{{ $order->tour->title }}</a>
                                        </li>
                                        <li>Số khách: <b>{{ $order->amount_customer }}</b></li>
                                        <li>Thanh toán: <b>{{ $order->payment_method }}</b></li>
                                        <li>Thời gian gửi:
                                            <b>{{ date('d/m/Y H:i:s', strtotime($order->created_at)) }}</b>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Nội dung gửi</label>
                                        <p>{{ $order->content }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <select name="status" class="form-control" id="">
                                            <option value="0" {{ $order->status == '0' ? 'selected' : '' }}>Chưa liên hệ
                                            </option>
                                            <option value="1" {{ $order->status == '1' ? 'selected' : '' }}>Đã liên hệ
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <label for="">Ghi chú</label>
                                        <textarea name="note" id="" class="form-control" placeholder="Ghi chú lại thông tin về khách hàng">{{$order->note}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-success" type="submit">Lưu lại</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@push('plugin-js')
@endpush

@push('js')
@endpush
