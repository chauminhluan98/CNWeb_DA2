<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getIndex()
	{
		$categories = Category::all();
		return view('admin.categories.index', ['categories' => $categories]);
	}
	
	public function getCreate()
	{
		return view('admin.categories.create');
	}
	
	public function postCreate(Request $request)
	{
		$request->validate([
			'category_name' => 'required|max:255|unique:categories',
		]);
		
		$category = new Category();
		$category->category_name = $request->category_name;
		$category->save();
		
		return redirect('admin/categories');
	}
	
	public function getEdit($id)
	{
		$category = Category::find($id);
		return view('admin.categories.edit', ['category' => $category]);
	}
	
	public function postEdit(Request $request)
	{
		$request->validate([
			'category_name' => 'required|max:255|unique:categories,category_name,' . $request->id,
		]);
		
		$category = Category::find($request->id);
		$category->category_name = $request->category_name;
		$category->updated_at = Carbon::now();
		$category->save();
		
		return redirect('admin/categories');
	}
	
	public function getDelete($id)
	{
		$category = Category::find($id);
		return view('admin.categories.delete', ['category' => $category]);
	}
	
	public function postDelete(Request $request)
	{
		$category = Category::find($request->id);
		$category->delete();
		
		return redirect('admin/categories');
	}
}
