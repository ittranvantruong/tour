<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Tour;
use App\Traits\SortTour;

class GroupTourController extends Controller
{
    //
    use SortTour;
    public function index(){
        
    }

    public function show(Request $request, $slug){
        
        $group = collect(config('custom.tour.group'))->firstWhere('slug', $slug);
        $title = $group['title'];
        $tours = Tour::select('id', 'group_id', 'title', 'slug', 'avatar', 'price', 'price_promotion')
            ->whereGroupId($group['id'])
            ->whereNotNull('category_id')
            ->whereStatus(1);

        $tours = $this->sortQuery($request->sort, $tours)->paginate(12);

        return view('public.tour.index', compact('title', 'tours'));
    }
}
