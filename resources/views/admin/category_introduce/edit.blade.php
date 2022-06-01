@extends('admin.layouts.master')

@section('title', 'Sửa danh mục bài viết')
@push('css')
    {{-- <link rel="stylesheet" href="{{ asset('public/lib/select2/dist/css/select2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
@endpush
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <form  action="{{ route('admin.danh-muc-bai-viet.update', $category_post->id) }}" method="post" >
            @csrf
            {{ method_field('put') }}
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sửa danh mục bài viết</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tên danh mục bài viết</label>
                                        <input type="text" class="form-control" name="title" value="{{$category_post->title}}"
                                            placeholder="Tên danh mục bài viết">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <div>
                                            <input type="checkbox" name="status" {{$category_post->status ==1 ? 'checked': ''}} data-toggle="toggle" data-size="sm"
                                                data-on="Hoạt động" data-off="Ngưng" data-onstyle="success"
                                                data-offstyle="danger">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="text-dark">Nội dung SEO</h4>
                                    <div class="form-group">
                                        <label for="">SEO từ khóa(Cách nhau dấu ",")</label>
                                        <input type="text" name="seo_keys" class="form-control"
                                            placeholder="SEO từ khóa" value="{{$category_post->seo_keys}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">SEO mô tả</label>
                                        <textarea name="seo_description" class="form-control" placeholder="SEO mô tả">{{$category_post->seo_description}}</textarea>
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
