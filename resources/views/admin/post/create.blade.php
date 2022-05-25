@extends('admin.layouts.master')

@section('title', 'Thêm bài viết')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/lib/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
@endpush
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <form id="formAdd" action="{{ route('admin.bai-viet.store') }}" method="post" data-parsley-validate>

            @csrf
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Thêm bài viết</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control d-none" name="avatar"
                                            value="/public/image/default-image.png">
                                        <img id="avatar" class="add-image-ckfinder pointer" data-preview="#avatar"
                                            data-input="input[name='avatar']" data-type=""
                                            src="{{ asset('/public/images/default-image.png') }}" alt=""
                                            style="width: 100%">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tiêu đề bài viết</label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Tiêu đề bài viết" required
                                            data-parsley-required-message="Bắt buộc nhập tiêu đề bài viết">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Danh mục bài viết</label>
                                        <select name="category_id" id="" class="form-control select2" required
                                            data-parsley-required-message="Bắt buộc chọn danh mục">
                                            <option value="">--Chọn danh mục--</option>
                                            @foreach ($category_posts as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <div>
                                            <input type="checkbox" name="status" checked data-toggle="toggle" data-size="sm"
                                                data-on="Hiện" data-off="Ẩn" data-onstyle="success" data-offstyle="danger">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nội dung bài viết</label>
                                        <textarea name="post_content"></textarea>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="text-dark">Nội dung SEO</h4>
                                    <div class="form-group">
                                        <label for="">SEO từ khóa(Cách nhau dấu ",")</label>
                                        <input type="text" name="seo_keys" class="form-control"
                                            placeholder="SEO từ khóa" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">SEO mô tả</label>
                                        <textarea name="seo_description" class="form-control" placeholder="SEO mô tả"></textarea>
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
    <script src="{{ asset('/public/admin/plugins/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('/public/admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('public/lib/select2/dist/js/select2.min.js') }}"></script>
@endpush

@push('js')
    <script>
        CKEDITOR.replace('post_content', {
            toolbar: [{
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                },
                {
                    name: 'editing',
                    items: ['Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                        'RemoveFormat'
                    ]
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                        'CreateDiv',
                        '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-',
                        'BidiLtr',
                        'BidiRtl'
                    ]
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink', 'Anchor']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                        'Iframe'
                    ]
                },
                '/',
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize', 'ShowBlocks', '-', 'About']
                }
            ]
        });

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
