<?php

namespace App\Admin\Http\Controllers;

use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\PostRequest;
use App\Models\Posts;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::with('category')->latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_posts = CategoryPost::orderBy('sort', 'asc')->get();
        return view('admin.post.create', compact('category_posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Posts::create($request->only('title','avatar', 'category_id', 'seo_keys', 'seo_description'));
        $post->status = formatStatusButton($request->status);
        $post->content = $request->post_content;
        $post->save();
        return back()->with('success', 'Thêm bài viết thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        $category_posts = CategoryPost::orderBy('sort', 'asc')->get();
        return view('admin.post.edit', compact('category_posts','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post= Posts::find($id);
        $post->update($request->only('title','avatar', 'category_id', 'seo_keys', 'seo_description'));
        $post->content = $request->post_content;
        $post->status = formatStatusButton($request->status);
        $post->save();
        return back()->with('success', 'Sửa bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::find($id)->delete();
        return back()->with('success', 'Xóa bài viết thành công');

    }
}
