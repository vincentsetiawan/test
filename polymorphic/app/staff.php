<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    //
	protected $fillable = ['name'];

	public function photos(){
		return $this->morphMany('App\Photo', 'imageable');
	}
}
