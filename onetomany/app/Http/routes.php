<?php
use App\User;
use App\Post;

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
	$user = User::findOrFail(1);

	$post = new Post(['title'=>'My First Post', 'body'=>'I Love Laravel']);
	$user->posts()->save($post);
});

Route::get('/read', function(){
	$user = User::findOrFail(1);

	foreach ($user->posts as $post) {
		echo $post->title . "<br />";
	}
});