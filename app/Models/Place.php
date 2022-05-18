<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Traits\Slug;
use Illuminate\Support\Facades\Cache;

class Place extends Model
{
    use HasFactory, Slug;
    protected $table = 'places';

    protected $fillable = ['group', 'type', 'title', 'slug', 'status', 'sort'];

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
}
