<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Traits\Slug;
use Illuminate\Support\Facades\Cache;

class CategoryTour extends Model
{
    use HasFactory, Slug;

    protected $table = 'category_tour';

    protected $fillable = ['title', 'slug', 'status', 'sort', 'type'];

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

    public function tour()
    {
        return $this->hasMany(Tour::class, 'category_id', 'id');
    }
}
