@extends('admin.layouts.master')

@section('title', 'Danh sách bài viết')
@push('css')

<link rel="stylesheet" href="{{asset('public/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css')}}">

@endpush
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="font-weight-bold text-primary mb-0">Danh sách bài viết</h6>
            <a href="{{ route('admin.bai-viet.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus-circle fa-sm text-white-50"></i> Thêm bài viết</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên bài viết</th>
                            <th>Danh mục</th>
                            <th>Đường dẫn</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->category->title}}</td>
                            <td>{{$item->slug}}</td>
                            <td>{!! status($item->status) !!}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('admin.bai-viet.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Sửa
                                    </a>
                                    <button type="button" data-target="#formDelete" data-action="{{ route('admin.bai-viet.destroy', $item->id) }}" class="btn-delete btn btn-sm btn-danger">
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