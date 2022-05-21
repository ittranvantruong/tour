@extends('admin.layouts.master')

@section('title', 'Thêm đơn hàng')
@push('css')
    {{-- <link rel="stylesheet" href="{{ asset('public/lib/select2/dist/css/select2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
@endpush
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <form id="formAdd" action="{{ route('admin.danh-muc-bai-viet.store') }}" method="post" data-parsley-validate>
            @csrf
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Thêm danh mục bài viết</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tên danh mục bài viết</label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Tên danh mục bài viết">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <div>
                                            <input type="checkbox" name="status" checked data-toggle="toggle" data-size="sm"
                                                data-on="Hoạt động" data-off="Ngưng" data-onstyle="success"
                                                data-offstyle="danger">
                                        </div>
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
