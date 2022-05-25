<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Place;
use App\Models\Setting;
use App\Models\Posts;
use Illuminate\Support\Facades\Cache;

class FooterComposer
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

        $settings = Cache::remember('setting_footer', now()->minutes(1440), function(){
            return Setting::select('key', 'plain_value')
                            ->whereIn('key', ['site_name', 'site_hotline', 'site_tel', 'site_address', 'site_email', 'site_facebook'])
                            ->pluck('plain_value', 'key');
        });

        $places = Cache::remember('place_menu', now()->minutes(60), function(){
            return Place::select('group', 'slug', 'title')
            ->whereType(1)->whereStatus(1)
            ->orderBy('sort', 'ASC')->get();
        });
        
        $posts = Cache::remember('new_posts', now()->minutes(60), function(){
            return Posts::latest()->whereStatus(1)->limit(3)->get();
        });

        $place_domestic = $places->whereIn('group', 0)->chunk(4);
        $place_abroad = $places->whereIn('group', 1)->chunk(4);

        $view->with([
            'group' => $group, 
            'place_domestic' => $place_domestic, 
            'place_abroad' => $place_abroad, 
            'posts' => $posts, 
            'settings' => $settings,
        ]);
    }
}