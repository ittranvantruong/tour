<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Posts;
use App\Models\Place;
use App\Models\CategoryPost;

class SidebarHomeComposer
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
        $posts = Cache::remember('post_sidebar_home', now()->minutes(60), function(){
            return Posts::select('id', 'category_id', 'title', 'slug', 'avatar', 'created_at')->whereStatus(1)->limit(5)->get();
        });
        $category_post = CategoryPost::select('id', 'title')->whereId(config('custom.post.category_home'))->first();
        if(!$category_post){
            $category_post = CategoryPost::select('id', 'title')->first();
        }
        $post_category = $posts->where('category_id', $category_post->id);
        $posts = $posts->sortByDESC('id');

        $place_from = Cache::remember('place_from_sidebar_home', now()->minutes(60), function(){
            return Place::select('id', 'title')->whereType(0)->whereStatus(1)->get();
        });
        $view->with(['category_post' => $category_post, 'post_category' => $post_category, 'posts' => $posts, 'place_from' => $place_from]);
    }
}