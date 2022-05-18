<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Admin\Http\Requests\PlaceTourRequest;

class PlaceTourController extends Controller
{
    //
    public function index(Request $request){

        if(!$request->filled('type') || !in_array($request->type, collect(config('custom.tour.place'))->keys()->all())){
            return abort('404');
        }

        $type = $request->type;
        $places = Place::select('id', 'group','title', 'status', 'sort')
        ->whereType($type)->orderBy('sort', 'ASC')->get();
        $group = config('custom.tour.group');
        return view('admin.place.index', compact('places', 'group', 'type'));
    }

    public function edit(Place $place){
        return $place->only('id', 'title', 'group', 'status', 'sort');
    }

    public function store(PlaceTourRequest $request){
        $data = $request->only(['title', 'group', 'type', 'status', 'sort']);
        $place = Place::create($data);
        $render = view('admin.place.row')->with('item', $place)->render();
        return response()->json([
            'status' => 200,
            'message' => 'Thêm danh mục thành công',
            'data' => $render
        ], 200);
    }

    public function update(PlaceTourRequest $request){
        $data = $request->only(['title', 'group', 'status', 'sort']);
        
        $category_tour = Place::find($request->id);
        $category_tour->update($data);
        $render = view('admin.place.row')->with('item', $category_tour)->render();

        return response()->json([
            'status' => 200,
            'message' => 'Sửa danh mục thành công',
            'replace' => $category_tour->id,
            'data' => $render
        ], 200);
    }

    public function delete(Place $place){
        if($place->id != 1){
            $place->delete();
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
                Place::whereIn('id', $request->id)->update(['status' => 1]);
            break; 
            case 'hidden': 
                Place::whereIn('id', $request->id)->update(['status' => 0]);
            break;
            case 'delete': 
                foreach($request->id as $value){
                    Place::find($value)->delete();
                }
            break; 
            default:
                return back()->with('error', 'Thực hiện không thành công');
                
        }
        return back()->with('success', 'Thực hiện thành công');

    }

    public function ajaxIndex(Request $request){
        $place = Place::select('id', 'title', 'type')->whereGroup($request->group)->get();
        $place_from = $place->where('type', 0);
        $place_to = $place->where('type', 1);
        return response()->json([
            'status' => 200,
            'data' => [
                'place_from' => $place_from,
                'place_to' => $place_to
                ]
        ], 200);
    }
}
