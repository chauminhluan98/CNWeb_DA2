<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	
	public function ComicsCategories()
	{
		return $this->belongsTo('App\ComicsCategories');
	}
	
	public function ComicBook()
	{
		return $this->belongsTo('App\ComicBook');
	}
	
}
