<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Tour;

class HomeController extends Controller
{
    //
    public function index(){
        $group = config('custom.tour.group');

        $tour = Cache::remember('tour_home', now()->minutes(60), function(){
            return Tour::select('id', 'group_id', 'category_id', 'title', 'slug', 'avatar', 'price', 'price_promotion')
            ->with('category_tour:id,title,slug')
            ->whereNotNull('category_id')
            ->whereNotNull('group_id')
            ->whereStatus(1)->limit(200)->get();
        });

        //tour trong nước
        $tour_domestic = $tour->whereIn('group_id', 0);
        //tour ngoài nước
        $tour_abroad = $tour->whereIn('group_id', 1);
        //tour sale
        $tour_sale = $tour->whereNotNull('price_promotion');

        //Nhóm theo danh mục
        $tour_macro = $tour->groupBy('category_id');

        return view('public.index', compact('group', 'tour_domestic', 'tour_abroad', 'tour_sale', 'tour_macro'));
    }
}
