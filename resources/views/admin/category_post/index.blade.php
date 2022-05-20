@extends('admin.layouts.master')

@section('title', 'Thêm đơn hàng')
@push('css')
    {{-- <link rel="stylesheet" href="{{ asset('public/lib/select2/dist/css/select2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin/css/category_post.css') }}">
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
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="font-weight-bold text-primary mb-0">Danh mục bài viết</h6>
                            <a href="{{ route('admin.danh-muc-bai-viet.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-plus-circle fa-sm text-white-50"></i> Thêm danh mục bài viết</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul id="sortable" data-url="{{ route('admin.category.updateSort') }}"
                                        class="sortable-container list-sortable">
                                        @foreach ($category_posts as $item)
                                            <li data-id="{{ $item->id }}"
                                                class=" sortable-item d-flex justify-content-between">
                                                <div><i class="fas fa-arrows-alt my-handle"></i><b>{{ $item->title }}</b>
                                                    -
                                                    <small>({{ $item->slug }})</small>
                                                </div>
                                                <div class="d-flex align-items-center sortable-tool"><small>Số bài viết:
                                                        0</small><a role="button" class="text-light" href="{{route('admin.danh-muc-bai-viet.edit', $item->id)}}"><i
                                                            class="fas fa-edit"></i></a> <span role="button"
                                                        class="sortable-delete"
                                                        data-url="{{ route('admin.danh-muc-bai-viet.destroy', $item->id) }}"><i
                                                            class="fas fa-times"></i></span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
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
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <script src="{{ asset('public/admin/js/jquery-sortable.js') }}"></script>
    <script src="{{ asset('public/admin/js/category_post.js') }}"></script>
@endpush

@push('js')
@endpush
