<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'author', 'img_url', 'stock', 'ori_stock'];

    public function genres()
    {
    	return $this->belongsToMany('App\Genre');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function getGenreListAttribute()
    {
    	return $this->genres->pluck('id')->toArray();
    }
}
