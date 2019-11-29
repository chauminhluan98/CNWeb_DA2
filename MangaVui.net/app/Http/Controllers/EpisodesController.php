<?php

namespace App\Http\Controllers;

use App\Episodes;
use App\ComicBook;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EpisodesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getIndex($id)
	{
		$episodes = Episodes::where('comic_book_id', '=', $id)->get();
		$name = ComicBook::raw(1)->where('id', '=', $id)->get();
		$user = Auth::user()->privilege;
		
		return view('admin.episodes.index', ['episodes' => $episodes, 'name' => $name, 'user' => $user]);
	}
	
	public function getCreate($id)
	{
		return view('admin.episodes.create', ['id' => $id]);
	}
	
	public function postCreate(Request $request)
	{
		$request->validate([
			'episode_title' => 'required|max:191',
			'episode_content' => 'required'
		]);
		
		$episode = new Episodes();
		$episode->comic_book_id = $request->comic_book_id;
		$episode->episode_title = $request->episode_title;
		$episode->episode_content = $request->episode_content;
		$episode->episode_status = (Auth::user()->privilege == "admin") ? 1 : 0;
		$episode->save();
		
		return redirect()->action('EpisodesController@getIndex', ['id' => $request->comic_book_id]);
	}
	
	public function getEdit($id)
	{
		$episode = Episodes::find($id);
		return view('admin.episodes.edit', ['episode' => $episode]);
	}
	
	public function postEdit(Request $request)
	{
		$request->validate([
			'episode_title' => 'required|max:255'
		]);
		
		$episode = Episodes::find($request->id);
		$episode->episode_title = $request->episode_title;
		$episode->episode_content = $request->episode_content;
		$episode->episode_status = (Auth::user()->privilege == "admin") ? 1 : 0;
		$episode->save();
		
		return redirect()->action('EpisodesController@getIndex', ['id' => $request->comic_book_id]);
	}
	
	public function getDelete($id)
	{
		$episode = Episodes::find($id);
		return view('admin.episodes.delete', ['episode' => $episode]);
	}
	
	public function postDelete(Request $request)
	{
		$episode = Episodes::find($request->id);
		$episode->delete();
		
		return redirect()->action('EpisodesController@getIndex', ['id' => $request->comic_book_id]);
	}
	
	public function getEpisodeStatus($id)
	{
		$episode = Episodes::find($id);
		$episode->episode_status = 1 - $episode->episode_status;
		$episode->save();
		
		return redirect()->action('EpisodesController@getIndex', ['id' => $episode->comic_book_id]);
	}
	
}
