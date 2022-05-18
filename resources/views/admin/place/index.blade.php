@extends('admin.layouts.master')

@section('title', 'Quản lý '.config('custom.tour.place')[$type])
@push('css')

<link rel="stylesheet" href="{{asset('public/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css')}}">

@endpush
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Thêm {{ config('custom.tour.place')[$type] }}</h4>
                </div>
                <div class="card-body">
                    <form id="formAdd" action="{{ route('admin.tour.place.store') }}" method="post"
                        data-parsley-validate>
                        @csrf
                        <input type="hidden" name="type" value="{{ $type }}">
                        <div class="form-group">
                            <label for="">Tên {{ config('custom.tour.place')[$type] }}</label>
                            <input type="text" name="title" class="form-control" placeholder="Nhập tên" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="form-group">
                            <label for="">Nhóm</label>
                            <select name="group" class="form-control">
                                @foreach($group as $key => $value)
                                <option value="{{ $key }}">{{ $value['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <input type="number" name="sort" class="form-control" min="0" placeholder="thứ tự" value="0"
                                required data-parsley-required-message="Trường này không được bỏ trống."
                                data-parsley-number-message="Trường này phải là số.">
                        </div>
                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <form id="formMultiple" action="{{ route('admin.tour.place.multiple') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách {{ config('custom.tour.place')[$type] }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-group col-12 col-md-6 ml-auto mb-4">
                            <select class="form-control" name="action" required>
                                <option value="">Chọn hành động</option>
                                <option value="show">Hiện</option>
                                <option value="hidden">Ẩn</option>
                                <option value="delete">Xóa</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Áp dụng</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width:30px;"><input type="checkbox" class="check-all"></th>
                                        <th>{{ config('custom.tour.place')[$type] }}</th>
                                        <th>Loại</th>
                                        <th>Trạng thái</th>
                                        <th>Thứ tự</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($places as $item)
                                        @include('admin.place.row', ['item' => $item])
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modalCategory" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Sửa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUpdate" action="{{ route('admin.tour.place.update') }}" method="post"
                    data-parsley-validate>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="{{ $type }}">
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="title" class="form-control" placeholder="Nhập tên danh mục" required
                            data-parsley-required-message="Trường này không được bỏ trống.">
                    </div>
                    <div class="form-group">
                        <label for="">Nhóm</label>
                        <select name="group" class="form-control">
                            @foreach($group as $key => $value)
                            <option value="{{ $key }}">{{ $value['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Sắp xếp</label>
                        <input type="number" name="sort" class="form-control" min="0" placeholder="thứ tự" value="0"
                            required data-parsley-required-message="Trường này không được bỏ trống."
                            data-parsley-number-message="Trường này phải là số.">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-js')

<script src="{{asset('public/sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('public/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

@endpush

@push('js')

<script src="{{  asset('public/admin/js/place.js') }}"></script>

<script>
    $(document).ready(function () {
        customDatatable('.table', [0, 5]);
    });
</script>

@endpush
