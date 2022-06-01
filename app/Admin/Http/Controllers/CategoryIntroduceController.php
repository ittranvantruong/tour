<?php

namespace App\Admin\Http\Controllers;

use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Models\CategoryIntroduce;
use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\CategoryPostRequest;

class CategoryIntroduceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_introduces = CategoryIntroduce::with('introduces')->orderBy('sort','asc')->get();
        return view('admin.category_introduce.index', compact('category_introduces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_introduce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryPostRequest $request)
    {
        if(CategoryIntroduce::exists()){
            $category_introduce = CategoryIntroduce::create($request->only('title', 'seo_keys', 'seo_description'));
            $category_introduce->status = formatStatusButton($request->status);
            $category_introduce->sort = CategoryIntroduce::max('sort') + 1;
            $category_introduce->save();
        }else{
            $category_introduce = CategoryIntroduce::create($request->only('title'));
            $category_introduce->status = formatStatusButton($request->status);
            $category_introduce->save();
        }
        return back()->with('success', 'Thêm danh mục giới thiệu thành công');
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
        $category_post->update(['title'=>$request->title, 'seo_keys' => $request->seo_keys, 'seo_description'=>$request->seo_description, 'status' => formatStatusButton($request->status)]);
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
        $category_introduce = CategoryIntroduce::whereId($id)->first();
        $category_introduce->introduces()->update(['introduce_id' =>1]);
        CategoryIntroduce::whereId($id)->delete();
        return response()->json(['status'=>true,'messag'=>'Đã xóa danh mục']);
    }

    public function updateSortable(Request $request){
        $category_introduce = CategoryIntroduce::find($request->id);
        $category_introduce->sort = $request->index;
        $category_introduce->save();
        return response()->json(['status'=>true,'messag'=>'Đã lưu thứ tự sắp xếp mới']);

    }
}
