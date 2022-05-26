@extends('admin.layouts.master')

@section('title', 'Danh sách bài viết')
@push('css')

<link rel="stylesheet" href="{{asset('public/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css')}}">

@endpush
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="font-weight-bold text-primary mb-0">Danh sách liên hệ</h6>
               </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Tour</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Số khách</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                            <td>{{$item->fullname}}</td>
                            <td><a href="{{route('admin.tour.edit', $item->tour->id)}}">{{$item->tour->title}}</a></td>
                            <td><a href="tel:{{$item->phone}}">{{$item->phone}}</a></td>
                            <td><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>
                            <td>{{$item->amount_customer}}</td>
                            <td>{{$item->note}}</td>
                            <td>{!! getOrderStatus($item->status) !!}</td>
                            <td>{{date('d/m/Y H:i:s', strtotime($item->created_at))}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('admin.lien-he.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Xem
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<form id="formDelete" action="" method="post">
    @csrf
    @method('DELETE')
</form>

@endsection

@push('plugin-js')

<script src="{{asset('public/sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('public/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

@endpush

@push('js')

@endpush