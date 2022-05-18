@extends('admin.layouts.master')

@section('title', 'Danh sách tour')
@push('css')

<link rel="stylesheet" href="{{asset('public/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css')}}">

@endpush
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="font-weight-bold text-primary mb-0">Danh sách tour</h6>
            <a href="{{ route('admin.tour.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus-circle fa-sm text-white-50"></i> Thêm tour</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên tour</th>
                            <th>Mã tour</th>
                            <th>Nhóm</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th>Nơi khởi hành</th>
                            <th>Nơi đến</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tours as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{config('custom.tour.group')[$item->group_id]['title']}}</td>
                            <td>{{optional($item->category_tour)->title}}</td>
                            <td>{{number_format($item->price)}} {{ $item->price_promotion ? '-'.number_format($item->price_promotion) : '' }}</td>
                            <td>{{optional($item->get_place_from)->title}}</td>
                            <td>{!! htmlPlaceTo($item->place_to) !!}</td>
                            <td>{!! status($item->status) !!}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('admin.tour.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Xem
                                    </a>
                                    <button type="button" data-target="#formDelete" data-action="{{ route('admin.tour.delete', $item->id) }}" class="btn-delete btn btn-sm btn-danger">
                                        <i class="fas fa-check"></i> Xóa
                                    </button>
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