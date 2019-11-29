<?php

namespace App\Http\Controllers;

use App\ComicsCategories;
use App\Category;
use App\ComicBook;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Redirector;

class ComicsCategoriesController extends Controller
{
	public function __construct()
	{
		
	}
	
	public function getIndex($id)
	{
		$comCate = ComicsCategories::where('comic_book_id', '=', $id)->get();
		$name = ComicBook::raw(1)->where('id', '=', $id)->get();
		$categories = Category::all();
		
		return view('admin.comics_categories.index', ['comCate' => $comCate, 'name' => $name, 'categories' => $categories]);
	}
	
	public function getCreate()
	{
		
	}
	
	public function postCreate(Request $request)
	{
		$request->validate([
			'category_id' => 'required|numeric'
		]);
		
		$comCate = new ComicsCategories();
		$comCate->comic_book_id = $request->id;
		$comCate->category_id = $request->category_id;
		$comCate->save();
		
		return redirect()->action('ComicsCategoriesController@getIndex', ['id' => $request->id]);
	}
	
	
	public function getDelete($id)
	{
		$comCate = ComicsCategories::find($id);
		
		return view('admin.comics_categories.delete', ['comCate' => $comCate]);
	}
	
	public function postDelete(Request $request)
	{
		$comCate = ComicsCategories::find($request->id);
		$comic = $request->comic_book_id;
		$comCate->delete();
		
		return redirect()->action('ComicsCategoriesController@getIndex', ['id' => $request->comic_book_id]);
	}
}
