<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';
	
	public function Taxonomy()
	{
		return $this->belongsTo('App\Taxonomy');
	}
	
	public function User()
	{
		return $this->belongsTo('App\User');
	}
	
	public function Comment()
	{
		return $this->hasMany('App\Comment');
	}
}
