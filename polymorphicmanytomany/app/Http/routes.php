<?php
use App\Post;
use App\Tag;
use App\Video;

/*
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

Route::get('/create', function(){
	//Buat sebuah post
	$post = Post::create(['name' => 'My first post']);
	//Dapatkan tag degan id 1
	$tag1 = Tag::find(1);
	//Hubungkan post yg dibuat dengan tag tersebut
	$post->tags()->save($tag1);

	$video = Video::create(['name' => 'My first video']);
	$tag2 = Tag::find(2);
	$video->tags()->save($tag2);	
});

Route::get('/read', function(){
	$post = Post::findOrFail(1);

	foreach ($post->tags as $tag) {
		echo $tag;
		echo "<br />";
		echo $tag->name;
	}
});

Route::get('/update', function(){
	//$post = Post::findOrFail(1);

	//foreach ($post->tags as $tag) {
	//	return $tag->whereName('PHP')->update(['name' => 'Updated PHP']);
	//}

	$post = Post::findOrFail(1);
	$tag = Tag::find(3);
	
	//$post->tags()->save($tag);
	
	//$post->tags()->attach($tag);

	$post->tags()->sync([2]);
});