<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Place;
use Illuminate\Support\Facades\Cache;

class MenuComposer
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

        $places = Cache::remember('place_menu', now()->minutes(60), function(){
            return Place::select('group', 'slug', 'title')
            ->whereType(1)->whereStatus(1)
            ->orderBy('sort', 'ASC')->get();
        });

        $place_domestic = $places->whereIn('group', 0);
        $place_abroad = $places->whereIn('group', 1);
        $view->with(['group' => $group, 'place_domestic' => $place_domestic, 'place_abroad' => $place_abroad]);
    }
}