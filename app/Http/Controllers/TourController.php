<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Setting;
use App\Traits\SortTour;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class TourController extends Controller
{
    //
    use SortTour;
    protected $title = 'Tất cả tour';

    public function index(Request $request){

        $title = $this->title;

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

        $tours = Tour::select('id', 'title', 'slug', 'avatar', 'price', 'price_promotion')
            ->whereNotNull('category_id')
            ->whereStatus(1);
        $tours = $this->sortQuery($request->sort, $tours)->paginate(12);

        return view('public.tour.index', compact('title', 'tours'));
    }

    public function show($slug){

        $setting = Setting::select('key', 'plain_value')
                            ->where('key', 'site_hotline')
                            ->pluck('plain_value', 'key');

        $tour = Tour::whereSlug($slug)->with(['get_place_from:id,title,slug', 'place_to:id,title,slug', 'file'])->firstOrFail();

        SEOMeta::setDescription(config('custom.seo.description'));
        SEOMeta::addKeyword(config('custom.seo.keyword'));
        OpenGraph::setDescription(config('custom.seo.description'));
        OpenGraph::setTitle($tour->title);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'product');

        TwitterCard::setTitle($tour->title);
        TwitterCard::setDescription(config('custom.seo.description'));
        TwitterCard::setType('summary');
        SEOMeta::setCanonical(url()->current());
        $header_logo = $tour->avatar;
        if($header_logo){
            OpenGraph::addImage($header_logo, ['width' => 1200]);
            TwitterCard::setImage($header_logo);
            JsonLd::addImage($header_logo);
        }

        JsonLd::setTitle('Article');
        JsonLd::setDescription(config('custom.seo.description'));
        JsonLd::setType('Article');

        $tour_watched = session()->get('tour_watched', []);
        if(!in_array($tour->id, array_keys($tour_watched))){
            $tour_watched[$tour->id] = (object) $tour->only('id', 'title', 'slug', 'price', 'price_promotion', 'avatar');
            session()->put('tour_watched', $tour_watched);
        }
        return view('public.tour.show', compact('tour', 'setting'));
    }
}
