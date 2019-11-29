<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComicBook;
use App\Category;
use App\ComicsCategories;
use App\Episodes;

class HomeController extends Controller
{
	public function __construct()
	{
		
	}
	
	public function getIndex()
	{
		$topcb = ComicBook::where('comic_book_status', 1)->get()->take(6);
		$category = Category::all()->take(10);
		$comicbooks = ComicBook::where('comic_book_status', 1)->paginate(9);
		
		$comic_cate = array();
		foreach($comicbooks as $value)
		{
			$comic_cate[$value->id] = ComicsCategories::where('comic_book_id', $value->id)->get();
		} 

		$choose = 0;// phân biệt lấy all hay theo thể loại

		return view('front-end', ['topcb' => $topcb, 'category' => $category, 'comicbooks' => $comicbooks, 'comic_cate' => $comic_cate, 'choose' => $choose]);
	}
	public function getHome()
	{
		return view('home');
	}
	public function getDetail($title)
	{
		// Xử lý $title
		$arrUrl = explode('.', $title);
		$arrTitle = explode('-', $arrUrl[0]);
		
		// Nếu là link của bài viết thì xem bài viết
		if(is_numeric($arrTitle[count($arrTitle) - 1]))
		{
			$comicbook = ComicBook::find($arrTitle[count($arrTitle) - 1]);
			$category = ComicsCategories::where('comic_book_id', $comicbook->id)->get();
			$episode = Episodes::where([['comic_book_id',$comicbook->id], ['episode_status', 1]])->orderBy('created_at', 'desc')->get();
			return view('detail', ['comicbook' => $comicbook, 'category' => $category, 'episode' => $episode]);
		}
		
	}
	public function getEpisode($episode)
	{
		$arrUrl = explode('.', $episode);
		$arrTitle = explode('-', $arrUrl[0]);

		$epi = Episodes::find($arrTitle[count($arrTitle) - 1]);
		
		return view('episode', ['epi'=>$epi]);
	}

	public function getIndexWithCatetory($title)
	{
		$arrUrl = explode('.', $title);
		$arrTitle = explode('-', $arrUrl[0]);

		$topcb = ComicBook::where('comic_book_status', 1)->get()->take(6);
		$category = Category::all()->take(10);
		
		if(is_numeric($arrTitle[count($arrTitle) - 1]))
		{
			$comicbooks = ComicsCategories::where('category_id', $arrTitle[count($arrTitle) - 1])->paginate(9);
		}

		$comic_cate = array();

		foreach($comicbooks as $value)
		{
			$comic_cate[$value->comic_book_id] = ComicsCategories::where('comic_book_id', $value->comic_book_id)->get();
		} 

		$choose = 1;
		return view('front-end', ['topcb' => $topcb, 'category' => $category, 'comicbooks' => $comicbooks, 'comic_cate' => $comic_cate, 'choose' => $choose]);
	}
}
