<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';
	
	public function Post()
	{
		return $this->belongsTo('App\Post');
	}
	
	public function User()
	{
		return $this->belongsTo('App\User');
	}
}
