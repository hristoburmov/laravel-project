<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'description', 'category_id',
    ];
    
    /** 
     * Get the comments for the post
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
