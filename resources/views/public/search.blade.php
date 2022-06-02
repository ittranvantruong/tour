<section id="box_tim_kiem" class="container">

    <form id="des_search" action="{{ route('search.index') }}" method="get">
        <div class=" show">
            <button id="search-head-title" type="button" class="btn btn-warning text-white text-uppercase mt-2"
                data-bs-toggle="collapse" href="#box-search" style="width: 100%;">
                Tìm kiếm
            </button>
            <div id="box-search" class="row">
                <div class="col-12 col-md-4">
                    <p class="m-0 text-warning">Nhóm tour</p>
                    <select class="form-control tour_group" name="sel_group_tour">
                        <option value="">-- Tất cả --</option>
                        @foreach ($group as $key => $item)
                            <option value="{{ $key }}">{{ $item['title'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <p class="m-0 text-warning">Nơi khởi hành</p>
                    <select class="form-control tour_group" name="sel_place_from_tour">
                        <option value="">-- Tất cả --</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <p class="m-0 text-warning">Nơi đến</p>
                    <select class="form-control tour_group" name="sel_place_to_tour">
                        <option value="">-- Tất cả --</option>
                    </select>
                </div>
                <div class="col-12 pt-2 text-center">
                    <button type="submit" class="btn btn-warning text-white text-uppercase">
                        Tìm kiếm</button>
                </div>
            </div>
        </div>
    </form>
    <div id="des_mobi">

    </div>
</section>
<script>
    var routeRenderPlaceToGroup = "{{ route('ajax.get.place.to.group') }}",
        nameRenderPlaceFrom = 'Tất cả',
        nameRenderPlaceTo = 'Tất cả';
</script>
<script src="{{ asset('public/js/search.js') }}"></script>
