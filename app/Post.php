<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'category_id', 'user_id'
    ];
    
    /** 
     * Get the comments for the post
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function category() {
        return $this->belongsTo('App\Category');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function getCommentsCountAttribute() {
        return $this->comments->count();
    } 
    
}
