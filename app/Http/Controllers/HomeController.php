<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Tour;
use App\Models\CategoryTour;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class HomeController extends Controller
{
    //
    public function index(){
        SEOMeta::setDescription(config('custom.seo.description'));
        SEOMeta::addKeyword(config('custom.seo.keyword'));
        OpenGraph::setDescription(config('custom.seo.description'));
        OpenGraph::setTitle('Trang chủ');
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'product');

        TwitterCard::setTitle('Trang chủ');
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

        $group = config('custom.tour.group'); 

        $data = Cache::remember('tour_home', now()->minutes(60), function(){

            //load category and tour
            $tour = $this->queryData();

            //get only tour
            $marco_tour = $tour->map(function($item){
                return (object) $item->tour;
            })->collapse();

            //tour trong nước
            $tour_domestic = $marco_tour->whereIn('group_id', 0);

            if($tour_domestic->count() < 12){
                $tour_domestic = $this->loadMissingGroup($tour_domestic, 0);
            }

            //tour ngoài nước
            $tour_abroad = $marco_tour->whereIn('group_id', 1);
            if($tour_abroad->count() < 12){
                $tour_abroad = $this->loadMissingGroup($tour_abroad, 1);
            }

            //tour sale
            $tour_sale = $marco_tour->whereNotNull('price_promotion');
            return [
                'tour' => $tour,
                'tour_domestic' => $tour_domestic, 
                'tour_abroad' => $tour_abroad,
                'tour_sale' => $tour_sale,
            ];
        });
        $data['group'] = $group;
        return view('public.index', $data);
    }

    public function queryData(){
        $tour = CategoryTour::select('id', 'title', 'slug')
            ->whereStatus(1)
            ->with(['tour' => function($query){
                $query->latest();
                $query->select('id', 'group_id', 'category_id', 'title', 'slug', 'avatar', 'price', 'price_promotion');
                $query->whereNotNull('group_id');
                $query->whereStatus(1);
                $query->limit(1);
            }])
            ->orderBy('sort', 'ASC')
            ->get();

        //load record missing every cat
        $tour = $this->loadMissingCategory($tour);
        
        $tour = $tour->reject(function($item){
            return $item->tour->isEmpty();
        });
        // dd($tour);
        return $tour;
    }

    public function loadMissingCategory($tour){
        return $tour->map(function ($item){
            $count = $item->tour->count();
            $id = $item->tour->pluck('id');
            if($count < 12){
                $tour = $item->tour;
                $item->load(['tour' => function($query) use ($count, $id) {
                    $query->latest();
                    $query->select('id', 'group_id', 'category_id', 'title', 'slug', 'avatar', 'price', 'price_promotion');
                    $query->whereNotNull('group_id');
                    $query->whereNotIn('id', $id);
                    $query->whereStatus(1);
                    $query->limit(12 - $count);
                }]);
                $tour = collect(array_merge($tour->all(), $item->tour->all()));
                $item->tour = $tour;
                return $item;
            }
        });
    }
    public function loadMissingGroup($tour, $group_id = 0){
        $id = $tour->pluck('id');
        $load = Tour::latest()
        ->select('id', 'group_id', 'category_id', 'title', 'slug', 'avatar', 'price', 'price_promotion')
        ->whereGroupId($group_id)
        ->whereNotIn('id', $id)
        ->whereStatus(1)
        ->limit(12 - $tour->count())
        ->get();
        return collect(array_merge($tour->all(), $load->all()));
    }
}
