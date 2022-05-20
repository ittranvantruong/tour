<?php

namespace App\Admin\Http\Controllers;

use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\CategoryPostRequest;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_posts = CategoryPost::with('posts')->orderBy('sort','asc')->get();
        return view('admin.category_post.index', compact('category_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryPostRequest $request)
    {
        if(CategoryPost::exists()){
            $categoryPost = CategoryPost::create($request->only('title'));
            $categoryPost->status = formatStatusButton($request->status);
            $categoryPost->sort = CategoryPost::max('sort') + 1;
            $categoryPost->save();
        }else{
            $categoryPost = CategoryPost::create($request->only('title'));
            $categoryPost->status = formatStatusButton($request->status);
            $categoryPost->save();
        }
        return back()->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_post = CategoryPost::find($id);
        return view('admin.category_post.edit', compact('category_post'));
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
        $category_post = CategoryPost::find($id);
        $category_post->update(['title'=>$request->title, 'status' => formatStatusButton($request->status)]);
        return back()->with('success', 'Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryPost::whereId($id)->delete();
        return response()->json(['status'=>true,'messag'=>'Đã xóa danh mục']);
    }

    public function updateSortable(Request $request){
        $category_post = CategoryPost::find($request->id);
        $category_post->sort = $request->index;
        $category_post->save();
        return response()->json(['status'=>true,'messag'=>'Đã lưu thứ tự sắp xếp mới']);

    }
}
