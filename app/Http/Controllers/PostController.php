<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Comment;
use App\Models\CategoryPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Posts::whereStatus(1)->with('category')->latest()->paginate(5);
        $category = CategoryPost::whereStatus(1)->with('posts')->orderBy('sort', 'asc')->first();
        return view('public.post.index',compact('posts'));
    }
    
    public function category(Request $request){
        $category = CategoryPost::whereSlug($request->category_slug)->with(['posts' => function($join){
            $join->paginate(5);
        }])->first();
        return view('public.post.category',compact('category'));

    }

    public function show(Request $request){
        $post = Posts::whereSlug($request->post_slug)->with('category')->first();
        $post_related =  Posts::whereCategoryId($post->category_id)->with('category')->take(2)->get();
        return view('public.post.show', compact('post', 'post_related'));
    }

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
}
