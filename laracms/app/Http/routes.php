<?php

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;
use App\Video;
use Carbon\Carbon;

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

// Route::resource('post', 'PostController');

// Route::get('/contact','PostController@contact');

// Route::get('/post/{id}/{name}/{password}','PostController@show_post');

// // Route::get('/insert', function()
// // {
// // 	DB::insert("INSERT INTO post(title, content) values(?, ?)",
// // 		['PHP WITH LARAVEL', 'Laravel is the best thing that happen to PHP']);
// // });

// // Route::get('/read', function()
// // {
// // 	$results = DB::select("SELECT * FROM post WHERE id = ?", [1]);
// // 	//foreach ($results as $post)
// // 	//{
// // 	//	return $post->title;
// // 	//}
// // 	return $results;
// // });

// // Route::get('/update', function()
// // {
// // 	$updated = DB::update("UPDATE post SET title = 'Update title' WHERE id = ?", [1]);
// // 	return $updated;
// // });

// // Route::get('/delete', function()
// // {
// // 	$deleted = DB::delete("DELETE FROM post WHERE id = ?",[1]);
// // 	return $deleted;
// // 

// Route::get('/read', function()
// {
// 	$posts = Post::all();
// 	foreach ($posts as $post)
// 	{
// 		return $post->title;
// 	}
// });

// Route::get('/find', function()
// {
// 	$post = Post::find(1);
// 	return $post->title;
// });

// Route::get('/findwhere', function(){
// 	$posts = Post::where('is_admin', 0)->orderBy('id', 'desc')->take(2)->get();
// 	//take(x), x digunakan untuk menampilkan berapa banyak data
// 	return $posts;
// });

// Route::get('/basicinsert', function(){
// 	$post = new Post;
// 	$post->title = 'New Eloquent Title';
// 	$post->content = 'Wow Eloquent Is Really Cool';
// 	$post->save();
// });

// Route::get('/create', function(){
// 	Post::create(['title' => 'create method', 'content' => 'saya belajar banyak setelah liburan']);
// });

// Route::get('/basicupdate', function(){
// 	$post = Post::find(2);

// 	$post->title   = 'Updated Eloquent Title';
// 	$post->content = 'Updated Eloquent Content';

// 	$post->save();
// });

// Route::get('/update', function(){
// 	Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'New PHP Title', 'content' => 'I love learning laravel']);
// });

// Route::get('/delete', function(){
// 	$post = Post::find(2);
// 	$post->delete();
// });

// Route::get('/delete2', function(){
// 	Post::destroy([1,4]);
// });

// Route::get('/delete3', function(){
// 	Post::where('is_admin', 0)->delete();
// });

// Route::get('/softdelete', function(){
// 	Post::find(5)->delete();
// });

// Route::get('/readsoftdelete', function(){
// 	//$post = Post::find(5);
// 	//return $post;

// 	//$post = Post::withTrashed()->where('id', 5)->get();
// 	//return $post;

// 	//$post = Post::withTrashed()->get();
// 	//return $post;

// 	$post = Post::onlyTrashed()->get();
// 	return $post;
// });

// Route::get('/restore', function(){
// 	Post::withTrashed()->where('id', 5)->restore();
// });

// Route::get('/forcedelete', function(){
// 	Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });

// //One to one relationship
// Route::get('/user/{id}/post', function($id){
// 	return User::find($id)->post->title;
// });

// Route::get('/post/{id}/user', function($id){
// 	return Post::find($id)->user->name;
// });

// //One to many relationship
// Route::get('/posts', function(){
// 	$user = User::find(1);

// 	foreach ($user->posts as $post){
// 		echo $post->title;
// 	}
// });

// //Many to many relationship
// Route::get('/user/{id}/role', function($id){
// 	$user = User::find($id)->roles()->orderBy('id', 'desc')->get();
// 	return $user;

// 	//foreach ($user->roles as $role){
// 	//	return $role->name;
// 	//}
// });

// //Accessing the intermediate Table/Pivot
// //MASIH ERROR, BELUM KELUAR HASILNYA
// Route::get('/user/{id}/pivot', function($id){
// 	$user = User::find($id);

// 	foreach ($user->roles as $role){
// 		echo $role->pivot->created_at;
// 	}
// });

// //Has many through relation
// Route::get('/user/country/{id}', function($id){
// 	$country = Country::find($id);

// 	foreach ($country->posts as $post) {
// 		return $post->title;
// 	}
// });

// //Polymorphic relations
// Route::get('/post/photos', function(){
// 	$post = Post::find(1);

// 	foreach ($post->photos as $photo) {
// 		return $photo->path;
// 	}
// });

// Route::get('/user/photos', function(){
// 	$user = User::find(1);

// 	foreach ($user->photos as $photo) {
// 		return $photo->path;
// 	}
// });

// Route::get('photo/{id}/post', function($id){
// 	$photo = Photo::findOrFail($id);
// 	return $photo->imageable;
// });

// //Polymorphic many to many
// Route::get('/post/tag', function(){
// 	$post = Post::find(1);
// 	foreach ($post->tags as $tag) {
// 		echo $tag->name;
// 	}
// });

// //Polymorphic many to many - Retrieving owner
// Route::get('/tag/post', function(){
// 	$tag = Tag::find(1);
// 	foreach ($tag->posts as $post) {
// 		echo $post->title;
// 	}
// });

/*
CRUD Application
*/

Route::resource('/posts', 'PostController');

Route::get('/dates', function(){
	$date = new DateTime('+1 week');
	echo $date->format('m-d-y');

	echo "<br />";
	echo Carbon::now();

	echo "<br />";
	echo Carbon::now()->diffForHumans();

	echo "<br />";
	echo Carbon::now()->addDays(10)->diffForHumans();

	echo "<br />";
	echo Carbon::now()->subMonths(5)->diffForHumans();

	echo "<br />";
	echo Carbon::now()->yesterday()->diffForHumans();
});