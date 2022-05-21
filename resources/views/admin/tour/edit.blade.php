@extends('admin.layouts.master')

@section('title', 'Sửa tour')
@push('css')
<link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
@endpush
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <form id="formAdd" action="{{ route('admin.tour.update') }}" method="post" data-parsley-validate>
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $tour->id }}">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Sửa tour</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-md-12 form-group">
                                <label for="">Tên tour</label>
                                <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề tour"
                                    required data-parsley-required-message="Trường này không được bỏ trống."
                                    value="{{ $tour->title }}">
                            </div>
                            <div class="col-12 col-md-9 form-group">
                                <label for="">Mã tour</label>
                                <input type="text" name="code" class="form-control" value="{{ $tour->code }}"
                                    placeholder="Nhập mã tour">
                            </div>
                            <div class="col-12 col-md-3 form-group">
                                <label for="">Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1">Hiện</option>
                                    <option {{ selected($tour->status, 0) }} value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label for="">Giá tiền</label>
                                <input type="number" name="price" class="form-control" min="0" placeholder="Giá tiền"
                                    value="{{ $tour->price }}" required
                                    data-parsley-number-message="Trường này phải là số."
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label for="">Giá khuyến mãi</label>
                                <input type="number" name="price_promotion" class="form-control" min="0"
                                    placeholder="Giá khuyến mãi" value="{{ $tour->price_promotion }}"
                                    data-parsley-lt="input[name='price']"
                                    data-parsley-number-message="Trường này phải là số."
                                    data-parsley-lt-message="Giá khuyến mãi phải nhỏ hơn giá mặc định.">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="">Chương trình tour</label>
                            <textarea name="description"
                                class="form-control ckeditor">{{ $tour->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Điều khoản</label>
                            <textarea name="term" class="form-control ckeditor">{{ $tour->term }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Quy định</label>
                            <textarea name="regulation" class="form-control ckeditor">{{ $tour->regulation }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                    <button type="submit" class="btn btn-warning">Sửa</button>
                        <button type="button" class="submit-form btn btn-danger" data-target="#formDelete">Xóa</button>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Nhóm và loại tour</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nhóm tour</label>
                            <select name="group_id" class="form-control" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                                @foreach($group as $key => $value)
                                <option {{ selected($tour->group_id, $key) }} value="{{ $key }}">{{ $value['title'] }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Loại tour</label>
                            <select name="category_id" class="form-control" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                                <option value="">Chọn loại tour</option>
                                @foreach($category_tour as $item)
                                <option {{ selected($tour->category_id, $item->id) }} value="{{ $item->id }}">
                                    {{ $item->title }}</option>
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
                            <select name="place_from" class="form-control" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                                <option value="">Chọn nơi khởi hành</option>
                                @foreach($place_from as $item)
                                <option {{ selected($tour->place_from, $item->id) }} value="{{ $item->id }}">
                                    {{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nơi đến</label>
                            <select name="place_to[]" class="form-control" multiple required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                                @foreach($place_to as $item)
                                <option {{ $item->selected }} value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
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
                            <input type="text" class="form-control d-none" name="avatar" value="{{ $tour->avatar }}">
                            <img id="avatar" class="add-image-ckfinder pointer" data-preview="#avatar"
                                data-input="input[name='avatar']" data-type="" src="{{asset($tour->avatar)}}" alt=""
                                style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Thư viện ảnh</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="d-none" name="gallery" value="{{ $gallery }}">
                            <div id="galleryPreview" class="row">
                                @foreach ($tour->file as $item)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mt-3">
                                    <span class="delete-image-ckfinder" data-url="{{ $item->path }}"
                                        data-route="{{route('admin.tour.gallery.delete', $item->id)}}">
                                        <i class="fas fa-times pointer"></i>
                                    </span>
                                    <img src="{{asset($item->path)}}" width="100%">
                                </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-primary add-image-ckfinder mt-3"
                                data-preview="#galleryPreview" data-input="input[name='gallery']"
                                data-type="MULTIPLE">thêm thư viện hình ảnh</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<form id="formDelete" action="{{ route('admin.tour.delete', $tour->id) }}" method="post">
    @csrf
    @method('DELETE')
</form>
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

@endpush