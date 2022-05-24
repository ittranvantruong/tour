<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class Posts extends Model
{
    protected $table = 'posts';
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title','category_id','status','content', 'avatar','slug'];

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
    public function category(){
        return $this->belongsTo(CategoryPost::class, 'category_id', 'id');
    }

    public function related_posts(){
        return static::select('id', 'title', 'slug', 'avatar','created_at')
            ->whereStatus(1)
            ->whereCategoryId($this->category_id)
            ->where('id', '!=', $this->id)
            ->orderBy('id', 'desc')
            ->limit(3);
    }
    public function get_new_posts(){
        return static::select('id', 'title', 'slug', 'avatar','created_at')
            ->whereStatus(1)
            ->orderBy('id', 'desc')
            ->limit(3);
    }
}