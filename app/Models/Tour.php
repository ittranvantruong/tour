<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Traits\Slug;
use Illuminate\Support\Facades\Cache;
class Tour extends Model
{
    use HasFactory, Slug;
    
    const ENTITY_TYPE = 'tour';

    protected $table = 'tours';

    protected $fillable = ['code', 'group_id', 'category_id', 'title', 'avatar', 'price', 'price_promotion', 'place_from', 'description', 'term', 'regulation', 'status', 'is_feature', 'is_promotion'];

    public static function boot()
    {
        parent::boot();
        
        static::saving(function ($model) {
            $model->slug = $model->createSlug($model->title, $model->id ? $model->id : 0);
        }); 
        static::saved(function () {
			Cache::flush();
		 });
    }

    public function category_tour(){
        return $this->belongsTo(CategoryTour::class, 'category_id', 'id');
    }

    public function file(){
        return $this->hasMany(File::class, 'entity_id', 'id')->whereEntityType(static::ENTITY_TYPE);
    }

    public function get_place_from(){
        return $this->belongsTo(Place::class, 'place_from', 'id');
    }

    public function place_to(){
        return $this->belongsToMany(Place::class, 'places_to_tours', 'tour_id', 'place_id');
    }


}
