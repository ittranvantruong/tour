<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryTour;
use App\Models\Tour;
use App\Models\File;
use App\Models\Place;
use App\Admin\Http\Requests\TourRequest;

class TourController extends Controller
{
    //

    public function index(){
        $tours = Tour::with(['get_place_from', 'place_to', 'category_tour'])->orderBy('id', 'desc')->get();
        return view('admin.tour.index', compact('tours'));
    }

    public function create(){

        $group = config('custom.tour.group');
        $category_tour = CategoryTour::select('id', 'title')->whereStatus(1)->get();
        return view('admin.tour.create', compact('group', 'category_tour'));

    }

    public function edit(Tour $tour){

        $group = config('custom.tour.group');
        $category_tour = CategoryTour::select('id', 'title')->whereStatus(1)->get();

        $place = Place::select('id', 'title', 'type')->whereGroup($tour->group_id)->get();
        $place_from = $place->where('type', 0);
        $place_to = $place->where('type', 1);

        $tour = $tour->load(['place_to:id', 'file:id,entity_id,path']);

        $place_to_select = $tour->place_to->pluck('id')->all();
        //marco render place to
        $place_to = $place_to->map(function ($item) use ($place_to_select) {
            $item->selected = '';
            if(in_array($item->id, $place_to_select)){
                $item->selected = 'selected';
            }
            return $item;
        });

        return view('admin.tour.edit', compact('tour', 'group', 'category_tour', 'place_from', 'place_to'));

    }

    public function store(TourRequest $request){
        $data = $request->only('title', 'code', 'status', 'price', 'price_promotion', 'avatar', 'group_id', 'category_id', 'place_from', 'description', 'term', 'regulation');
        
        $tour = Tour::create($data);

        $tour->place_to()->attach($request->place_to);

        //xử lý thư viện ảnh
        $request->whenFilled('gallery', function($gallery) use ($tour) {
            foreach(explode(",", $gallery) as $value){
                $tour->file()->create([
                    'entity_type' => Tour::ENTITY_TYPE,
                    'path' => $value
                ]);
            }
        });
        return redirect()->route('admin.tour.edit', $tour->id);
    }

    public function update(TourRequest $request){
        $data = $request->only('title', 'code', 'status', 'price', 'price_promotion', 'avatar', 'group_id', 'category_id', 'place_from', 'description', 'term', 'regulation');
        
        $tour = Tour::find($request->id);
        
        $tour->update($data);

        $tour->place_to()->sync($request->place_to);
        $tour->file()->delete();

        //xử lý thư viện ảnh
        $request->whenFilled('gallery', function($gallery) use ($tour) {
            foreach(explode(",", $gallery) as $value){
                $tour->file()->create([
                    'entity_type' => Tour::ENTITY_TYPE,
                    'path' => $value
                ]);
            }
        });
        return back()->with('success', 'Thực hiện thành công');
    }

    public function delete(Tour $tour){
        $tour->delete();
        if(request()->ajax()){
            return response()->json(['success' => 'Thực hiện thành công']);
        }
        return back()->with('success', 'Thực hiện thành công');
    }

    public function galleryDelete(File $file) {
        return $file->delete();
    }

}
