<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
	protected $table = 'episodes';
	
	public function ComicBook()
	{
		return $this->belongsTo('App\ComicBook');
	}
	
}
