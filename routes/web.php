<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','StaticPagesController@home')->name('home');
Route::get('/help','StaticPagesController@help')->name('help');
Route::get('/about','StaticPagesController@about')->name('about');

//注册
Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('users', 'UsersController');

Route::get('/users/{user}', 'UsersController@show')->name('users.show');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

//找回密码
Route::get('FindPasswordEmail','PasswordController@email')->name('FindPasswordEmail');
Route::post('FindPasswordSend','PasswordController@send')->name('FindPasswordSend');
Route::get('FindPasswordEdit{token}','PasswordController@edit')->name('FindPasswordEdit');
Route::post('FindPasswordUpdate','PasswordController@update')->name('FindPasswordUpdate');

//添加/删除微博
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

//关注和粉丝
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

//关注用户和取消关注
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');