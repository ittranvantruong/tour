<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryTour;
use App\Admin\Http\Requests\CategoryTourRequest;

class CategoryTourController extends Controller
{
    //
    public function index(){
        $category_tour = CategoryTour::select('id', 'title', 'status', 'sort')
        ->orderBy('sort', 'ASC')->get();
        return view('admin.category_tour.index', compact('category_tour'));
    }

    public function edit(CategoryTour $category_tour){
        return $category_tour->only('id', 'title', 'status', 'sort');
    }

    public function store(CategoryTourRequest $request){
        $data = $request->only(['title', 'status', 'sort']);
        $category_tour = CategoryTour::create($data);
        $render = view('admin.category_tour.row')->with('item', $category_tour)->render();
        return response()->json([
            'status' => 200,
            'message' => 'Thêm danh mục thành công',
            'data' => $render
        ], 200);
    }

    public function update(CategoryTourRequest $request){
        $data = $request->only(['title', 'status', 'sort']);
        
        $category_tour = CategoryTour::find($request->id);
        $category_tour->update($data);
        $render = view('admin.category_tour.row')->with('item', $category_tour)->render();

        return response()->json([
            'status' => 200,
            'message' => 'Sửa danh mục thành công',
            'replace' => $category_tour->id,
            'data' => $render
        ], 200);
    }

    public function delete(CategoryTour $category_tour){
        if($category_tour->id != 1){
            $category_tour->delete();
        }
        return response()->json([
            'status' => 200,
            'message' => 'Thực hiện thành công'
        ], 200);
    }

    public function multiple(Request $request){
        // dd($request);
        if (!$request->filled('action') || !$request->filled('id') || in_array(1, $request->id) || !in_array($request->action, ['show', 'hidden', 'delete'])) {
            return back()->with('error', 'Thực hiện không thành công');
        }
        switch ($request->action) { 
            case 'show': 
                CategoryTour::whereIn('id', $request->id)->update(['status' => 1]);
            break; 
            case 'hidden': 
                CategoryTour::whereIn('id', $request->id)->update(['status' => 0]);
            break;
            case 'delete': 
                foreach($request->id as $value){
                    CategoryTour::find($value)->delete();
                }
            break; 
            default:
                return back()->with('error', 'Thực hiện không thành công');
                
        }
        return back()->with('success', 'Thực hiện thành công');

    }

}
