<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\MenuComposer;
use App\View\Composers\SidebarComposer;
use App\View\Composers\SidebarHomeComposer;
use App\View\Composers\FooterComposer;
use App\View\Composers\SidebarPostComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('public.layouts.menu', MenuComposer::class);
        View::composer('public.tour.sidebar', SidebarComposer::class);
        View::composer('public.sidebar', SidebarHomeComposer::class);
        View::composer('public.layouts.footer', FooterComposer::class);
        View::composer('public.post.sidebar', SidebarPostComposer::class);

    }
}
