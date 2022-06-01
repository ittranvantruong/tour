<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class CategoryIntroduce extends Model
{
    protected $table = 'category_introduce';
    use HasFactory;
    use Sluggable;

    protected $fillable = ['seo_keys', 'seo_description','title','status','sort','slug'];

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

    public function introduces(){
        return $this->hasMany(Introduce::class, 'introduce_id', 'id');
    }
}
