<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Tour;
use App\Models\Posts;
use Illuminate\Support\Facades\Cache;

class SideBarComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */

    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies are automatically resolved by the service container...
        
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $group = config('custom.tour.group');
        $tour_sale = Cache::remember('tour_sale_sidebar', now()->minutes(60), function(){
            return Tour::select('id', 'title', 'slug', 'avatar', 'price', 'price_promotion')
            ->whereNotNull('category_id')
            ->whereNotNull('price_promotion')
            ->whereStatus(1)
            ->limit(3)
            ->get();
        });
        $posts = Cache::remember('post_sidebar', now()->minutes(60), function(){
            return Posts::select('id', 'category_id', 'title', 'slug', 'avatar', 'created_at')->whereStatus(1)->limit(5)->get();
        });
        $view->with(['tour_sale' => $tour_sale, 'group' => $group, 'posts' => $posts]);
    }
}