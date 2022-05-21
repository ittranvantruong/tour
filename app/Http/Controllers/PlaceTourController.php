<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Place;
use App\Traits\SortTour;
use DB;

class PlaceTourController extends Controller
{
    //
    use SortTour;
    public function index(){
        
    }
    public function show(Request $request, $slug){

        $place = Place::select('id', 'title')->whereSlug($slug)->firstOrFail();
        $title = $place->title;

        $tour_id = DB::table('places_to_tours')->wherePlaceId($place->id)->pluck('tour_id');

        $tours = Tour::select('id', 'group_id', 'title', 'slug', 'avatar', 'price', 'price_promotion')
            ->whereIn('id', $tour_id)
            ->whereNotNull('category_id')
            ->whereStatus(1);

        $tours = $this->sortQuery($request->sort, $tours)->paginate(12);

        return view('public.tour.index', compact('title', 'tours'));
    }
}
