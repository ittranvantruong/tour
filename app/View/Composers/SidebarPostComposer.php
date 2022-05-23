<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Posts;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Cache;

class SidebarPostComposer
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
        
        $posts = Cache::remember('new_post', now()->minutes(60), function(){
            return Posts::get_new_posts()->get();
        });

        $category = Cache::remember('category_sidebar', now()->minutes(60), function(){
            return CategoryPost::select('id', 'title', 'slug')->whereStatus(1)->orderBy('sort', 'ASC')->get();
        });

        $view->with([
            'posts' => $posts, 
            'category' => $category
        ]);
    }
}