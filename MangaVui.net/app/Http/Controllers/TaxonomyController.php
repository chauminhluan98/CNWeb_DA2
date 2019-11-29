<?php

namespace App\Http\Controllers;

use App\Taxonomy;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaxonomyController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getIndex()
	{
		$taxonomies = Taxonomy::all();
		return view('admin.taxonomies.index', ['taxonomies' => $taxonomies]);
	}
	
	public function getCreate()
	{
		return view('admin.taxonomies.create');
	}
	
	public function postCreate(Request $request)
	{
		$request->validate([
			'taxonomy_name' => 'required|max:255|unique:taxonomies',
		]);
		
		$taxonomy = new Taxonomy();
		$taxonomy->taxonomy_name = $request->taxonomy_name;
		$taxonomy->save();
		
		return redirect('admin/taxonomies');
	}
	
	public function getEdit($id)
	{
		$taxonomy = Taxonomy::find($id);
		return view('admin.taxonomies.edit', ['taxonomy' => $taxonomy]);
	}
	
	public function postEdit(Request $request)
	{
		$request->validate([
			'taxonomy_name' => 'required|max:255|unique:taxonomies,taxonomy_name,' . $request->id,
		]);
		
		$taxonomy = Taxonomy::find($request->id);
		$taxonomy->taxonomy_name = $request->taxonomy_name;
		$taxonomy->updated_at = Carbon::now();
		$taxonomy->save();
		
		return redirect('admin/taxonomies');
	}
	
	public function getDelete($id)
	{
		$taxonomy = Taxonomy::find($id);
		return view('admin.taxonomies.delete', ['taxonomy' => $taxonomy]);
	}
	
	public function postDelete(Request $request)
	{
		$taxonomy = Taxonomy::find($request->id);
		$taxonomy->delete();
		
		return redirect('admin/taxonomies');
	}
}
