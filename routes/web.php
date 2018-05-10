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

use App\User;
use App\Tweet;
Use App\Http\Controllers\UserController;

Route::get('/', function () {
    if(Auth::check()) return redirect('home');
    return view('welcome');
});

Auth::routes();

//
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'TweetController@store')->name('new-tweet');

//user profile
Route::get('/user/{user_slug}', 'HomeController@tweetsByUser')->name('user.profile');

//user follower action
Route::post('/user/{target_user_slug}/follow', 'UserController@followUser')->name('user.follow');
Route::post('/user/{target_user_slug}/unfollow', 'UserController@unFollowUser')->name('user.unfollow');

//get user followers, followings
Route::get('/user/{target_user_slug}/followers', 'UserController@followers')->name('user.followers');
Route::get('/user/{target_user_slug}/followings', 'UserController@followings')->name('user.followings');

//test function
Route::get('test', function () {
    $isfollowing = UserController::isFollowing(User::find(4), Auth::user());
    if(!$isfollowing) echo "falsedsf";
});
