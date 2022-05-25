<div class="row show_products">
    @forelse($data as $item)
        @include('public.tour.loop.tour-simple', ['item' => $item])

    @empty
        <div class="col-12 p-3">
            <div class="text-muted text-center">
                <p>Chưa có tour nào trong mục này.</p>
            </div>
        </div>
    @endforelse
</div>