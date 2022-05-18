@extends('admin.layouts.master')

@section('title', 'Thêm tour')
@push('css')
<link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
@endpush
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <form id="formAdd" action="{{ route('admin.tour.store') }}" method="post" data-parsley-validate>
        @csrf
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm tour</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                        <div class="col-12 col-md-12 form-group">
                                <label for="">Tên tour</label>
                                <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề tour" required data-parsley-required-message="Trường này không được bỏ trống." value="{{ old('title') }}">
                            </div>
                            <div class="col-12 col-md-9 form-group">
                                <label for="">Mã tour</label>
                                <input type="text" name="code" class="form-control" value="{{ old('code') }}" placeholder="Nhập mã tour">
                            </div>
                            <div class="col-12 col-md-3 form-group">
                                <label for="">Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label for="">Giá tiền</label>
                                <input type="number" name="price" class="form-control" min="0" placeholder="Giá tiền"
                                    value="{{ old('price') }}" required data-parsley-number-message="Trường này phải là số." data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label for="">Giá khuyến mãi</label>
                                <input type="number" name="price_promotion" class="form-control" min="0"
                                    placeholder="Giá khuyến mãi" value="{{ old('price_promotion') }}" data-parsley-lt="input[name='price']"
                                    data-parsley-number-message="Trường này phải là số." data-parsley-lt-message="Giá khuyến mãi phải nhỏ hơn giá mặc định.">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="">Chương trình tour</label>
                            <textarea name="description" class="form-control ckeditor">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Điều khoản</label>
                            <textarea name="term" class="form-control ckeditor">{{ old('term') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Quy định</label>
                            <textarea name="regulation" class="form-control ckeditor">{{ old('regulation') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-block">Thêm</button>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Nhóm và loại tour</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nhóm tour</label>
                            <select name="group_id" class="form-control" required data-parsley-required-message="Trường này không được bỏ trống.">
                                @foreach($group as $key => $value)
                                <option value="{{ $key }}">{{ $value['title'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Loại tour</label>
                            <select name="category_id" class="form-control" required data-parsley-required-message="Trường này không được bỏ trống.">
                                <option value="">Chọn loại tour</option>
                                @foreach($category_tour as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Nơi khởi hành và nơi đến</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nơi khởi hành</label>
                            <select name="place_from" class="form-control" required data-parsley-required-message="Trường này không được bỏ trống.">
                                <option value="">Chọn nơi khởi hành</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nơi đến</label>
                            <select name="place_to[]" class="form-control" multiple required data-parsley-required-message="Trường này không được bỏ trống.">
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Hình đại diện</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control d-none" name="avatar"
                                 value="{{ old('avatar', '/public/images/default-image.png') }}">
                            <img id="avatar" class="add-image-ckfinder pointer" data-preview="#avatar"
                                data-input="input[name='avatar']" data-type=""
                                src="{{asset(old('avatar', '/public/images/default-image.png'))}}" alt="" style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Thư viện ảnh</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="d-none" name="gallery" value="" >
                            <div id="galleryPreview" class="row">
                                    
                            </div>
                            <button type="button" class="btn btn-primary add-image-ckfinder mt-3" data-preview="#galleryPreview" data-input="input[name='gallery']" data-type="MULTIPLE">thêm thư viện hình ảnh</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('plugin-js')

<script src="{{ asset('public/admin/plugins/ckfinder/ckfinder.js') }}"></script>
<script src="{{ asset('public/admin/plugins/ckeditor/ckeditor.js') }}"></script>

@endpush

@push('js')
<script src="{{ asset('public/lib/Parsley.js-2.9.2/comparison.js') }}"></script>
<script>
    var routeLoadPlace = "{{ route('admin.ajax.tour.place.index') }}";

</script>
<script src="{{ asset('public/admin/js/tour.js') }}"></script>
<script>
    $(document).ready(function(){
        loadPlace();
    });
</script>
@endpush