<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Cache;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Http\Controllers\MailController;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class SinglePageController extends Controller
{
    
    public function introduction(){
        
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
        return view('public.single_page.introduction', compact('title', 'content'));
    }

    public function contact(Request $request){
        $title = 'Liên hệ';

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

        $settings = Cache::remember('setting_contact', now()->minutes(1440), function(){
            return Setting::select('key', 'plain_value')->pluck('plain_value', 'key');
        });
        if($request->has('tour')){
            $tour = Tour::whereSlug($request->tour)->first();
            return view('public.single_page.contact', compact('title', 'settings', 'tour'));
        }else{
            $tours = Tour::latest()->get();
            return view('public.single_page.contact', compact('title', 'settings', 'tours'));
        }
    }
    public function postContact(Request $request){
        $tour = Tour::find($request->tour_id);
        $form_data = $request;
        Order::create($request->all());
        $mailController = new MailController();
        $mailController->sendMailContact($form_data, $tour);
        return back()->with('success', 'Gửi thông tin thành công, chúng tôi sẽ liên hệ bạn');
    }
}
