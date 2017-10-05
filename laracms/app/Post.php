<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = [
    	'title',
    	'content',
        'path'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function photos(){
    	return $this->morphMany('App\Photo', 'imageable');
    }

    public function tags(){
    	return $this->morphToMany('App\Tag', 'taggable');
    }

    public function scopeLatest($query){
        //Format nama function --> scope + MAUNGAPAIN
        //scope + Latest (mau menampilkan latest post)

        return $query->orderBy('id', 'desc')->get();
    }
}