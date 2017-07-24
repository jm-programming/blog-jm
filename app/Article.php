<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";

    protected $fillable = ['title','content', 'category_id', 'user_id'];


    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

     public function images(){
    	return $this->hasMany('App\Image');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();;
    }
}
