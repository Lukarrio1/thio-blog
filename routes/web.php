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

Route::get('/welcome', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/blog', 'PostsController');
Route::get('/','PostsController@index');


Route::prefix('profile')->group(function () {
Route::get('/','Profile\ProfileController@edit')->name('profile.edit');
Route::get('/user','Profile\ProfileController@User');
Route::put('/update','Profile\ProfileController@update');
Route::post('/picture','Profile\ProfileController@picture');
});
