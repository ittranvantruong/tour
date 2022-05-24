@extends('public.layouts.master')

@section('title', 'Trang chủ')

@push('css')
<link href="{{ asset('public/css/homepage.css') }}" rel="stylesheet" type="text/css">

@endpush

@section('content')

<main>
    <!-------------------- Slide Banner ---------------------->
    <div class="row">
        <div class="col col-12">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('public/uploads/images/banner2.jpeg') }}" width="100%" height="550px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public/uploads/images/banner.jpeg') }}" width="100%" height="550px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public/uploads/images/banner2.jpeg') }}" width="100%" height="550px">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
    <!-------------------- End Slide Banner ---------------------->
    
    @include('public.search', ['group' => $group])
    

    <section id="banner_bottom_search" class="pb-3 display_none_mobile">
        <div class="container pt-1">
            <div class="row">
                <div class="col-12 pt-1 col-md-6">
                    <img class="rounded" src="{{ asset('public/uploads/images/banner.jpeg') }}" width="100%" height="250px">
                </div>
                <div class="col-12 col-md-6 pt-1">
                    <img class="rounded" src="{{ asset('public/uploads/images/banner.jpeg') }}" width="100%" height="250px">
                </div>
            </div>
        </div>
    </section>


    <!-- main nav tabs 1 -->
    <section class="container pb-5 pt-5" id="main_desktop">
        <div class="row">
            <div class="col-12 col-md-9">
                <!-- Tab content number 1 -->
                <div class="pb-3 home-nav-tab" id="tab_content_1">
                    <div class="row">
                        <div class="col-8">
                            <ul class="nav nav-tabs mb-1" id="TabNav1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link add-link-readmore text-uppercase active" id="{{ $group[0]['slug'] }}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{ $group[0]['slug'] }}" data-href="{{ route('group.show', $group[0]['slug']) }}" data-link_target=".readmore-tab1">
                                        {{ $group[0]['title'] }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link add-link-readmore text-uppercase" id="{{ $group[1]['slug'] }}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{ $group[1]['slug'] }}" data-href="{{ route('group.show', $group[1]['slug']) }}" data-link_target=".readmore-tab1">
                                        {{ $group[1]['title'] }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link add-link-readmore text-uppercase" id="tabTourSale-tab" data-bs-toggle="tab" data-bs-target="#tabTourSale"  data-href="{{ route('search.index', ['sale' => 1]) }}" data-link_target=".readmore-tab1">
                                        TOUR KHUYẾN MÃI
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('group.show', $group[0]['slug']) }}" class="mt-2 readmore-tab1"><small>Xem thêm <i class="fas fa-angle-double-right"></i></small></a>
                        </div>
                    </div>
                    

                    <div class="tab-content pt-2" id="TabContentGroupTour">
                        <div class="tab-pane fade show active" id="tab-{{ $group[0]['slug'] }}">
                            @include('public.tour.partials.entry-tour', ['data' => $tour_domestic])
                        </div>
                        <div class="tab-pane fade show" id="tab-{{ $group[1]['slug'] }}">
                            @include('public.tour.partials.entry-tour', ['data' => $tour_abroad])
                        </div>
                        <div class="tab-pane fade" id="tabTourSale">
                            @include('public.tour.partials.entry-tour', ['data' => $tour_sale])
                        </div>
                        
                    </div>
                </div>
                <!-- End tab content number 1 -->

                <!-- Tab content number 2 -->
                <div class="pb-3 home-nav-tab" id="tab_content_2">
                    <div class="row">
                        <div class="col-8">
                            <ul class="nav nav-tabs mb-1" role="tablist">
                                @foreach($tour_macro as $item)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link add-link-readmore @if($loop->first) active @endif text-uppercase"  data-bs-toggle="tab" data-bs-target="#{{ $item[0]->category_tour->slug }}" data-href="{{ route('category.show', $item[0]->category_tour->slug) }}" data-link_target=".readmore-tab2">
                                        {{ $item[0]->category_tour->title }}
                                    </button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('category.show', $tour_macro->first()[0]->category_tour->slug) }}" class="mt-2 readmore-tab2"><small>Xem thêm <i class="fas fa-angle-double-right"></i></small></a>
                        </div>
                    </div>
                    <div class="tab-content pt-2">
                        @foreach($tour_macro as $item)
                        <div class="tab-pane fade show @if($loop->first) active @endif" id="{{ $item[0]->category_tour->slug }}">
                            @include('public.tour.partials.entry-tour', ['data' => $item])
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- End tab content number 2 -->
            </div>

            @include('public.sidebar')
        </div>
    </section>

    @include('public.partner')
</main>

@endsection

@section('sidebarMobile')


@endsection

@push('js')
<script src="{{ asset('public/js/header.js') }}"></script>
<script src="{{ asset('public/js/loaitour.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".add-link-readmore").click(function() {
            var href = $(this).data("href"), target = $(this).data("link_target");
            $(target).attr("href", href);
        });
    })

</script>
@endpush