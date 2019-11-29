<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
	protected $table = 'taxonomies';
	
	public function Post()
	{
		return $this->hasMany('App\Post');
	}
}
