<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComicBook extends Model
{
	protected $table = 'comic_books';
	
	public function ComicsCategories()
	{
		return $this->belongsTo('App\ComicsCategories');
	}
	
	public function Category()
	{
		return $this->belongsTo('App\Category');
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
