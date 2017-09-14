<?php

use App\Post;

/*
routes.php
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/about',function(){
	//return "Hi about page";
//});

//Route::get('/contact',function(){
	//return "Hi, I am contact";
//});

//Route::get('/post/{id}/{name}',function($id, $name){
	//return "This is post number ".$id." ".$name;
//});

//Route::get('/admin/post/example', array('as'=>'admin.home',function(){
	//$url = route('admin.home');
	//return "This url is : " . $url;
//}));

//Route::get('/post/{id}', 'PostController@index');

Route::resource('post', 'PostController');

Route::get('/contact','PostController@contact');

Route::get('/post/{id}/{name}/{password}','PostController@show_post');

// Route::get('/insert', function()
// {
// 	DB::insert("INSERT INTO post(title, content) values(?, ?)",
// 		['PHP WITH LARAVEL', 'Laravel is the best thing that happen to PHP']);
// });

// Route::get('/read', function()
// {
// 	$results = DB::select("SELECT * FROM post WHERE id = ?", [1]);
// 	//foreach ($results as $post)
// 	//{
// 	//	return $post->title;
// 	//}
// 	return $results;
// });

// Route::get('/update', function()
// {
// 	$updated = DB::update("UPDATE post SET title = 'Update title' WHERE id = ?", [1]);
// 	return $updated;
// });

// Route::get('/delete', function()
// {
// 	$deleted = DB::delete("DELETE FROM post WHERE id = ?",[1]);
// 	return $deleted;
// 

Route::get('/read', function()
{
	$posts = Post::all();
	foreach ($posts as $post)
	{
		return $post->title;
	}
});

Route::get('/find', function()
{
	$post = Post::find(1);
	return $post->title;
});

Route::get('/findwhere', function(){
	$posts = Post::where('is_admin', 0)->orderBy('id', 'desc')->take(2)->get();
	//take(x), x digunakan untuk menampilkan berapa banyak data
	return $posts;
});

Route::get('/basicinsert', function(){
	$post = new Post;
	$post->title = 'New Eloquent Title';
	$post->content = 'Wow Eloquent Is Really Cool';
	$post->save();
});

Route::get('/create', function(){
	Post::create(['title' => 'create method', 'content' => 'saya belajar banyak setelah liburan']);
});

Route::get('/basicupdate', function(){
	$post = Post::find(2);

	$post->title   = 'Updated Eloquent Title';
	$post->content = 'Updated Eloquent Content';

	$post->save();
});

Route::get('/update', function(){
	Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'New PHP Title', 'content' => 'I love learning laravel']);
});

Route::get('/delete', function(){
	$post = Post::find(2);
	$post->delete();
});

Route::get('/delete2', function(){
	Post::destroy([1,4]);
});

Route::get('/delete3', function(){
	Post::where('is_admin', 0)->delete();
});

Route::get('/softdelete', function(){
	Post::find(5)->delete();
});

Route::get('/readsoftdelete', function(){
	//$post = Post::find(5);
	//return $post;

	//$post = Post::withTrashed()->where('id', 5)->get();
	//return $post;

	//$post = Post::withTrashed()->get();
	//return $post;

	$post = Post::onlyTrashed()->get();
	return $post;
});