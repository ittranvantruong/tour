<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function category(){
        return $this->belongsTo(CategoryPost::class, 'category_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}