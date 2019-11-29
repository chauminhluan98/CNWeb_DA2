<?php

namespace App\Http\Controllers;

use App\ComicBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ComicBookController extends Controller
{
	public function getIndex()
	{
		$comic_books = ComicBook::orderBy('created_at', 'desc')->get();
		return view('admin.comic_books.index', ['comic_books' => $comic_books]);
	}
	
	public function getCreate()
	{
		return view('admin.comic_books.create');
	}
	
	public function postCreate(Request $request)
	{
		$request->validate([
			'comic_cover' => 'required',
			'comic_book_title' => 'required|string|max:191'
		]);
		
		$c = new ComicBook();
		$c->user_id = Auth::id();
		$c->comic_cover = $request->comic_cover;
		$c->comic_book_title = $request->comic_book_title;
		$c->comic_book_title_slug = Str::slug($request->comic_book_title, '-');
		$c->comic_book_excerpt = $request->comic_book_excerpt;
		$c->comic_book_views = 0;
		$c->comic_book_status = (Auth::user()->privilege == "admin") ? 1 : 0;
		$c->completed = (isset( $request->completed)) ? 1 : 0;
		$c->save();
		
		return redirect('admin/comic_books/user');
	}
	
	public function getDetails($id)
	{
		//
	}
	
	public function getEdit($id)
	{
		$comic_book = ComicBook::find($id);
		return view('admin.comic_books.edit', ['comic_book' => $comic_book]);
	}
	
	public function postEdit(Request $request)
	{
		$request->validate([
			'comic_cover' => 'required',
			'comic_book_title' => 'required|string|max:191'
		]);
		
		$c = ComicBook::find($request->id);
		$c->comic_cover = $request->comic_cover;
		$c->comic_book_title = $request->comic_book_title;
		$c->comic_book_title_slug = Str::slug($request->comic_book_title, '-');
		$c->comic_book_excerpt = $request->comic_book_excerpt;
		$c->completed = (isset( $request->completed)) ? 1 : 0;
		$c->save();
		
		return redirect('admin/comic_books/user');
	}
	
	public function getDelete($id)
	{
		$comic_book = ComicBook::find($id);
		return view('admin.comic_books.delete', ['comic_book' => $comic_book]);
	}
	
	public function postDelete(Request $request)
	{
		$comic_book = ComicBook::find($request->id);
		$comic_book->delete();
		
		return redirect('admin/comic_books/user');
	}
	
	public function getUserComicBooks()
	{
		$comic_books = ComicBook::where('user_id', '=', Auth::id())->orderBy('created_at', 'desc')->get();
		return view('admin.comic_books.user', ['comic_books' => $comic_books]);
	}
	
	public function getComicBookStatus($id)
	{
		$comic_book = ComicBook::find($id);
		$comic_book->comic_book_status = 1 - $comic_book->comic_book_status;
		$comic_book->save();
		
		return redirect('admin/comic_books');
	}
	
	public function getComicBookCompleted($id)
	{
		$comic_book = ComicBook::find($id);
		$comic_book->completed = 1 - $comic_book->completed;
		$comic_book->save();
		
		if(Auth::user()->privilege == "admin")
		{
			return redirect('admin/comic_books');
		}
		else
		{
			return redirect('admin/comic_books/user');
		}
	}
	
}
