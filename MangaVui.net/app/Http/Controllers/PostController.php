<?php

namespace App\Http\Controllers;

use App\Taxonomy;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
	public function getIndex()
	{
		$posts = Post::orderBy('created_at', 'desc')->get();
		return view('admin.posts.index', ['posts' => $posts]);
	}
	
	public function getCreate()
	{
		$taxonomies = Taxonomy::all();
		return view('admin.posts.create', ['taxonomies' => $taxonomies]);
	}
	
	public function postCreate(Request $request)
	{
		$request->validate([
			'taxonomy_id' => 'required|numeric',
			'post_title' => 'required|string|max:191',
			'post_content' => 'required',
		]);
		
		$p = new Post();
		$p->user_id = Auth::id();
		$p->taxonomy_id = $request->taxonomy_id;
		$p->post_title = $request->post_title;
		$p->post_title_slug = Str::slug($request->post_title, '-');
		$p->post_excerpt = $request->post_excerpt;
		$p->post_content = $request->post_content;
		$p->post_views = 0;
		$p->post_status = (Auth::user()->privilege == "admin") ? 1 : 0;
		$p->comment_status = (isset( $request->comment_status)) ? 1 : 0;
		$p->save();
		
		return redirect('admin/posts/user');
	}
	
	public function getDetails($id)
	{
		//
	}
	
	public function getEdit($id)
	{
		$post = Post::find($id);
		$taxonomies = Taxonomy::all();
		return view('admin.posts.edit', ['post' => $post, 'taxonomies' => $taxonomies]);
	}
	
	public function postEdit(Request $request)
	{
		$request->validate([
			'taxonomy_id' => 'required|numeric',
			'post_title' => 'required|string|max:191',
			'post_content' => 'required',
		]);
		
		$p = Post::find($request->id);
		$p->taxonomy_id = $request->taxonomy_id;
		$p->post_title = $request->post_title;
		$p->post_title_slug = Str::slug($request->post_title, '-');
		$p->post_excerpt = $request->post_excerpt;
		$p->post_content = $request->post_content;
		$p->comment_status = (isset( $request->comment_status)) ? 1 : 0;
		$p->save();
		
		return redirect('admin/posts/user');
	}
	
	public function getDelete($id)
	{
		$post = Post::find($id);
		return view('admin.posts.delete', ['post' => $post]);
	}
	
	public function postDelete(Request $request, $id)
	{
		$post = Post::find($request->id);
		$post->delete();
		
		return redirect('admin/posts/user');
	}
	
	public function getUserPosts()
	{
		$posts = Post::where('user_id', '=', Auth::id())->with('Taxonomy')->orderBy('created_at', 'desc')->get();
		return view('admin.posts.user', ['posts' => $posts]);
	}
	
	public function getPostStatus($id)
	{
		$post = Post::find($id);
		$post->post_status = 1 - $post->post_status;
		$post->save();
		
		return redirect('admin/posts');
	}
}
