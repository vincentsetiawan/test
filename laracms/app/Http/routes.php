<?php

use App\post;

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