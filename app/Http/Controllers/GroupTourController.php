<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Tour;
use App\Traits\SortTour;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;


class GroupTourController extends Controller
{
    //
    use SortTour;
    public function index(){
        
    }

    public function show(Request $request, $slug){
        
        $group = collect(config('custom.tour.group'))->firstWhere('slug', $slug);
        $title = $group['title'];

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
            ->whereGroupId($group['id'])
            ->whereNotNull('category_id')
            ->whereStatus(1);

        $tours = $this->sortQuery($request->sort, $tours)->paginate(12);

        return view('public.tour.index', compact('title', 'tours'));
    }
}
