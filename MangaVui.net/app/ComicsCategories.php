<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComicsCategories extends Model
{
	protected $table = 'comics_categories';
	
	public function ComicBook()
	{
		return $this->belongsTo('App\ComicBook');
	}
	
	public function Category()
	{
		return $this->belongsTo('App\Category');
	}
	
}
