<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name', 
    ];
    
    /** 
     * Get the posts for the category
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
