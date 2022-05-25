<form action="{{ url()->current() }}" method="get">
    @foreach(request()->except('sort') as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
    <div class="search_filter">
        <span>Sắp xếp theo: </span>
        <select onchange="this.form.submit()" name="sort" class="form-control">
            <option value="0">Thứ tự</option>
            <option {{ selected(request()->sort, 1) }} value="1">Mặc định</option>
            <option {{ selected(request()->sort, 2) }} value="2">A → Z</option>
            <option {{ selected(request()->sort, 3) }} value="3">Z → A</option>
            <option {{ selected(request()->sort, 4) }} value="4">Giá tăng dần</option>
            <option {{ selected(request()->sort, 5) }} value="5">Giá giảm dần</option>
            <option {{ selected(request()->sort, 6) }} value="6">Mới nhất</option>
            <option {{ selected(request()->sort, 7) }} value="7">Cũ nhất</option>
        </select>
    </div>
</form>