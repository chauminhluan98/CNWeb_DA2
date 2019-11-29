<?php

namespace App\Http\Controllers;

use App\ComicBook;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function getIndex()
	{
		//
	}
	
	public function getCreate()
	{
		//
	}
	
	public function postCreate(Request $request)
	{
		//
	}
	
	public function getDetails($id)
	{
		//
	}
	
	public function getEdit($id)
	{
		//
	}
	
	public function postEdit(Request $request, $id)
	{
		//
	}
	
	public function getDelete($id)
	{
		//
	}
	
	public function postDelete(Request $request, $id)
	{
		//
	}
	
	public function getCommentStatus($id)
	{
		$comic_book = ComicBook::find($id);
		$comic_book->comment_status = 1 - $comic_book->comment_status;
		$comic_book->save();
		
		return redirect('admin/comic_books');
	}
}
