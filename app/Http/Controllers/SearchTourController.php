<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Tour;
use App\Models\Place;
use App\Traits\SortTour;
use DB;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class SearchTourController extends Controller
{
    //
    use SortTour;

    public $title = 'Kết quả tìm kiếm';
    public function index(Request $request)
    {
        $title = $this->title;

        $keyword = $request->keyword;

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

        
        $tours = Tour::select('id', 'group_id', 'title', 'slug', 'avatar', 'price', 'price_promotion')
        ->where('title', 'like', '%' . $keyword . '%')
        ->whereNotNull('category_id')
        ->whereStatus(1);
        //tìm kiếm theo nhóm du lịch
        if($request->filled('sel_group_tour')){
            $tours = $tours->whereGroupId($request->sel_group_tour);
        }
        //tìm kiếm theo nới khơi hành
        if($request->filled('sel_place_from_tour')){
            $tours = $tours->wherePlaceFrom($request->sel_place_from_tour);
        }
        // tìm kiếm theo nơi đến
        if($request->filled('sel_place_to_tour')){
            $tour_id = DB::table('places_to_tours')->wherePlaceId($request->sel_place_to_tour)->pluck('tour_id');
            $tours = $tours->whereIn('id', $tour_id);
        }
        // tìm kiếm sale
        if($request->filled('sale')){
            $query = $request->sale ? 'whereNotNull' : 'whereNull';
            $tours = $tours->$query('price_promotion');
        }
        // sắp xếp
        $tours = $this->sortQuery($request->sort, $tours)->paginate(12);

        return view('public.tour.index', compact('title', 'tours'));

    }

    public function getPlaceToGroup(Request $request){
        $group_tour_id = $request->group_tour_id;

        $place = Cache::remember('get_place_to_group-'.$group_tour_id, now()->minutes(60), function() use ($group_tour_id){
            return Place::select('id', 'title', 'type')
                        ->whereGroup($group_tour_id)->whereStatus(1)
                        ->orderBy('sort', 'ASC')->get();
        });
        
        $place_from = $place->where('type', 0);

        $place_to = $place->where('type', 1);

        return response()->json([
            'status' => 200,
            'message' => ' Thực hiện thành công',
            'place_from' => $place_from,
            'place_to' => $place_to
        ], 200);
    }
}
