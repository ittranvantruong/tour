<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
    //
    public function index(){
        return view('public.tour.index');
    }

    public function show($slug){
        $tour = Tour::whereSlug($slug)->with(['get_place_from:id,title,slug', 'place_to:id,title,slug', 'file'])->firstOrFail();
        $tour_watched = session()->get('tour_watched', []);
        if(!in_array($tour->id, array_keys($tour_watched))){
            $tour_watched[$tour->id] = (object) $tour->only('id', 'title', 'slug', 'price', 'price_promotion', 'avatar');
            session()->put('tour_watched', $tour_watched);
        }
        return view('public.tour.show', compact('tour'));
    }
}
