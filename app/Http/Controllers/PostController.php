<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Comment;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class PostController extends Controller
{
    public function index(){
        $posts = Posts::whereStatus(1)->with('category')->latest()->paginate(2);
        $category = CategoryPost::whereStatus(1)->with('posts')->orderBy('sort', 'asc')->first();

        $title = 'Cẩm nang du lịch';

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

        // $posts = Posts::select('id', 'title', 'slug', 'avatar','created_at')
        //     ->whereStatus(1)
        //     ->orderBy('id', 'desc')
        //     ->paginate(8);
        
        return view('public.post.index', compact('posts', 'title'));
    }
    
    public function category(Request $request){
        $category = CategoryPost::whereSlug($request->category_slug)->first();
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
        return view('public.post.category',compact('category'));

    }

    // public function show(Request $request){
    //     $post = Posts::whereSlug($request->post_slug)->with('category')->first();
    //     $post_related =  Posts::whereCategoryId($post->category_id)->with('category')->take(2)->get();
    //     return view('public.post.show', compact('post', 'post_related'));
    // }

    public function postComment(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
        ], [

            'name.required' => 'Nhập tên của bạn',
            'email.required' => 'Nhập email của bạn',
            'content.required' => 'Nhập nội dung',
        ]);
        Comment::create($request->all());
        return back()->with('success', 'Đã đăng bình luận của bạn');
    }
    public function show(Request $request, $slug){
        // $post = Posts::select('id', 'category_id', 'title', 'avatar', 'content','created_at')
        //     ->whereStatus(1)
        //     ->whereSlug($slug)
        //     ->first();
        $post = Posts::whereSlug($request->post_slug)->with('category')->first();
        $post_related =  Posts::whereCategoryId($post->category_id)->with('category')->take(2)->get();
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

        $related_posts = $post->related_posts()->get();
        return view('public.post.show', compact('post', 'post_related'));
}
}
