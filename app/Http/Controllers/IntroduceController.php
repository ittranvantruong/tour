<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Introduce;
use Illuminate\Http\Request;
use App\Models\CategoryIntroduce;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Cache;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Http\Controllers\MailController;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class IntroduceController extends Controller
{
    public function index(){
        $title = 'Giới thiệu';

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

        $content = 'Giới thiệu';
        $setting = Setting::select('plain_value')->where('key', 'site_introduce')->first();
        if($setting){
            $content = $setting->plain_value;
        }
        return view('public.introduce.index', compact('title', 'content'));
    }
    public function category(Request $request){
        $category = CategoryIntroduce::whereSlug($request->category_slug)->first();
        SEOMeta::setDescription($category->seo_description);
        SEOMeta::addKeyword($category->seo_keys);
        OpenGraph::setDescription($category->seo_description);
        OpenGraph::setTitle($category->title);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'blog');

        TwitterCard::setTitle($category->title);
        TwitterCard::setDescription($category->seo_description);
        TwitterCard::setType('summary');
        SEOMeta::setCanonical(url()->current());
        $header_logo = config('custom.images.logo');
        if($header_logo){
            OpenGraph::addImage($header_logo, ['width' => 1200]);
            TwitterCard::setImage($header_logo);
            JsonLd::addImage($header_logo);
        }

        JsonLd::setTitle('Article');
        JsonLd::setDescription($category->seo_description);
        JsonLd::setType('Article');
        return view('public.introduce.category',compact('category'));

    }
    public function show(Request $request, $slug){
        // $post = Posts::select('id', 'category_id', 'title', 'avatar', 'content','created_at')
        //     ->whereStatus(1)
        //     ->whereSlug($slug)
        //     ->first();
        $post = Introduce::whereSlug($request->post_slug)->with('category')->first();
        $post_related =  Introduce::whereIntroduceId($post->introduce_id)->with('category')->take(2)->get();
        SEOMeta::setDescription($post->seo_description);
        SEOMeta::addKeyword($post->seo_keys);
        OpenGraph::setDescription($post->seo_description);
        OpenGraph::setTitle($post->title);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'product');

        TwitterCard::setTitle($post->title);
        TwitterCard::setDescription($post->seo_description);
        TwitterCard::setType('summary');
        SEOMeta::setCanonical(url()->current());
        $header_logo = asset($post->avatar);
        if($header_logo){
            OpenGraph::addImage($header_logo, ['width' => 1200]);
            TwitterCard::setImage($header_logo);
            JsonLd::addImage($header_logo);
        }

        JsonLd::setTitle('Article');
        JsonLd::setDescription($post->seo_description);
        JsonLd::setType('Article');

        // $related_posts = $post->related_posts()->get();
        return view('public.introduce.show', compact('post', 'post_related'));
    }
}
