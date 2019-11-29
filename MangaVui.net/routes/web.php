<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/v', function() {
	$laravel = app();
	return "Version: Laravel " . $laravel::VERSION;
});

Route::get('/clear/cache', function() {
	Artisan::call('cache:clear');
	return "Cache is cleared.";
});

Route::get('/clear/view', function() {
	Artisan::call('view:clear');
	return "Views are cleared.";
});

Auth::routes();

Route::get('/', 'HomeController@getIndex');
Route::get('/home', 'HomeController@getHome')->name('home');
Route::get('/detail/{title}', 'HomeController@getDetail');
Route::get('/content/{episode}', 'HomeController@getEpisode');
Route::get('/choose/{title}', 'HomeController@getIndexWithCatetory');

Route::get('/admin/taxonomies', 'TaxonomyController@getIndex');
Route::get('/admin/taxonomies/create', 'TaxonomyController@getCreate');
Route::post('/admin/taxonomies/create', 'TaxonomyController@postCreate');
Route::get('/admin/taxonomies/edit/{id}', 'TaxonomyController@getEdit');
Route::post('/admin/taxonomies/edit', 'TaxonomyController@postEdit');
Route::get('/admin/taxonomies/delete/{id}', 'TaxonomyController@getDelete');
Route::post('/admin/taxonomies/delete', 'TaxonomyController@postDelete');

//thể loại--category--categories
Route::get('/admin/categories', 'CategoryController@getIndex');
Route::get('/admin/categories/create', 'CategoryController@getCreate');
Route::post('/admin/categories/create', 'CategoryController@postCreate');
Route::get('/admin/categories/edit/{id}', 'CategoryController@getEdit');
Route::post('/admin/categories/edit', 'CategoryController@postEdit');
Route::get('/admin/categories/delete/{id}', 'CategoryController@getDelete');
Route::post('/admin/categories/delete', 'CategoryController@postDelete');

//người dùng--user--users
Route::get('/admin/users', 'UserController@getIndex');
Route::get('/admin/users/create', 'UserController@getCreate');
Route::post('/admin/users/create', 'UserController@postCreate');
Route::get('/admin/users/edit/{id}', 'UserController@getEdit');
Route::post('/admin/users/edit', 'UserController@postEdit');
Route::get('/admin/users/delete/{id}', 'UserController@getDelete');
Route::post('/admin/users/delete', 'UserController@postDelete');

Route::get('/admin/posts', 'PostController@getIndex');
Route::get('/admin/posts/create', 'PostController@getCreate');
Route::post('/admin/posts/create', 'PostController@postCreate');
Route::get('/admin/posts/edit/{id}', 'PostController@getEdit');
Route::post('/admin/posts/edit', 'PostController@postEdit');
Route::get('/admin/posts/delete/{id}', 'PostController@getDelete');
Route::post('/admin/posts/delete', 'PostController@postDelete');
Route::get('/admin/posts/user', 'PostController@getUserPosts');
Route::get('/admin/posts/status/{id}', 'PostController@getPostStatus');

//truyện tranh--comic_book--comic_books
Route::get('/admin/comic_books', 'ComicBookController@getIndex');
Route::get('/admin/comic_books/create', 'ComicBookController@getCreate');
Route::post('/admin/comic_books/create', 'ComicBookController@postCreate');
Route::get('/admin/comic_books/edit/{id}', 'ComicBookController@getEdit');
Route::post('/admin/comic_books/edit', 'ComicBookController@postEdit');
Route::get('/admin/comic_books/delete/{id}', 'ComicBookController@getDelete');
Route::post('/admin/comic_books/delete', 'ComicBookController@postDelete');
Route::get('/admin/comic_books/user', 'ComicBookController@getUserComicBooks');
Route::get('/admin/comic_books/status/{id}', 'ComicBookController@getComicBookStatus');
Route::get('/admin/comic_books/completed/{id}', 'ComicBookController@getComicBookCompleted');

//truyện tranh-thể loại--comics_categories
Route::get('/admin/comics_categories/{id}', 'ComicsCategoriesController@getIndex');
Route::post('/admin/comics_categories/create', 'ComicsCategoriesController@postCreate');
Route::get('/admin/comics_categories/delete/{id}', 'ComicsCategoriesController@getDelete');
Route::post('/admin/comics_categories/delete', 'ComicsCategoriesController@postDelete');

//danh sách tập--episode--episodes
Route::get('/admin/episodes/{id}', 'EpisodesController@getIndex');
Route::get('/admin/episodes/create/{id}', 'EpisodesController@getCreate');
Route::post('/admin/episodes/create', 'EpisodesController@postCreate');
Route::get('/admin/episodes/edit/{id}', 'EpisodesController@getEdit');
Route::post('/admin/episodes/edit', 'EpisodesController@postEdit');
Route::get('/admin/episodes/delete/{id}', 'EpisodesController@getDelete');
Route::post('/admin/episodes/delete', 'EpisodesController@postDelete');
Route::get('/admin/episodes/status/{id}', 'EpisodesController@getEpisodeStatus');

Route::get('/admin/comments', 'CommentController@getIndex');
Route::get('/admin/comments/create', 'CommentController@getCreate');
Route::post('/admin/comments/create', 'CommentController@postCreate');
Route::get('/admin/comments/edit/{id}', 'CommentController@getEdit');
Route::post('/admin/comments/edit', 'CommentController@postEdit');
Route::get('/admin/comments/delete/{id}', 'CommentController@getDelete');
Route::post('/admin/comments/delete', 'CommentController@postDelete');
Route::get('/admin/comments/status/{id}', 'CommentController@getCommentStatus');