<?php

namespace App\Admin\Http\Controllers;

use App\Models\Posts;
use App\Models\Introduce;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Models\CategoryIntroduce;
use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\PostRequest;

class IntroduceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Introduce::with('category')->latest()->get();
        return view('admin.introduce.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_posts = CategoryIntroduce::orderBy('sort', 'asc')->get();
        return view('admin.introduce.create', compact('category_posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Introduce::create($request->only('title','avatar', 'introduce_id', 'seo_keys', 'seo_description'));
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
        $post = Introduce::find($id);
        $category_posts = CategoryIntroduce::orderBy('sort', 'asc')->get();
        return view('admin.introduce.edit', compact('category_posts','post'));
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
        $post= Introduce::find($id);
        $post->update($request->only('title','avatar', 'introduce_id', 'seo_keys', 'seo_description'));
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
        Introduce::find($id)->delete();
        return back()->with('success', 'Xóa bài viết thành công');

    }
}
