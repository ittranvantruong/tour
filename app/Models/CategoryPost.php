<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class CategoryPost extends Model
{
    protected $table = 'category_post';
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title','status','sort','slug'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public static function boot()
    {
        parent::boot();
        static::saved(function () {
			Cache::flush();
		 });
         static::deleting(function () {
            Cache::flush();
		 });
    }

    public function posts(){
        return $this->hasMany(Posts::class, 'category_id', 'id');
    }
}
