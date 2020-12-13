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

Route::get('/event', function () {
    return view('events.index');
});

Auth::routes();

Route::post('follow/{event}', 'FollowsController@store');

Route::get('/event', 'EventController@index');
Route::get('/event/create', 'EventController@create')->middleware('auth');
Route::post('/event', 'EventController@store');
Route::get('/event/{event}', 'EventController@show');
Route::get('/event/{event}/edit', 'EventController@edit');
Route::patch('/event/{event}', 'EventController@update');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
