<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Tour;
use App\Models\Place;
use App\Models\Setting;
use App\Traits\SortTour;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class PlaceTourController extends Controller
{
    //
    use SortTour;
    public function index(){
        
    }
    public function show(Request $request, $slug){

        $place = Place::select('id', 'title')->whereSlug($slug)->firstOrFail();
        $title = $place->title;
        $setting = Setting::select('key', 'plain_value')
        ->where('key', 'site_hotline')
        ->orWhere('key', 'site_zalo')
        ->pluck('plain_value', 'key');
        SEOMeta::setDescription(config('custom.seo.description'));
        SEOMeta::addKeyword(config('custom.seo.keyword'));
        OpenGraph::setDescription(config('custom.seo.description'));
        OpenGraph::setTitle($title);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'product');

        TwitterCard::setTitle($title);
        TwitterCard::setDescription(config('custom.seo.description'));
        TwitterCard::setType('summary');
        SEOMeta::setCanonical(url()->current());
        $header_logo = config('custom.images.logo');
        if($header_logo){
            OpenGraph::addImage($header_logo, ['width' => 1200]);
            TwitterCard::setImage($header_logo);
            JsonLd::addImage($header_logo);
        }

        JsonLd::setTitle('Article');
        JsonLd::setDescription(config('custom.seo.description'));
        JsonLd::setType('Article');

        $tour_id = DB::table('places_to_tours')->wherePlaceId($place->id)->pluck('tour_id');

        $tours = Tour::select('id', 'group_id', 'title', 'slug', 'avatar', 'price', 'price_promotion')
            ->whereIn('id', $tour_id)
            ->whereNotNull('category_id')
            ->whereStatus(1);

        $tours = $this->sortQuery($request->sort, $tours)->paginate(12);

        return view('public.tour.index', compact('title', 'tours', 'setting'));
    }
}
