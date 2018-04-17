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



Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::resource('articles', 'ArticleController');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::resource('/ideas','IdeaController');


Route::get('/admin/admin/{id}', 'AdminController@beAdmin');
Route::get('/admin/bde/{id}', 'AdminController@beBDE');
Route::get('/admin/cesi/{id}', 'AdminController@beCesi');
Route::get('/admin/student/{id}', 'AdminController@beStudent');

<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles/cart/{id}', 'ArticleController@addToCart');

=======
Route::resource('articles', 'ArticleController');
Route::resource('events','EventController');
Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 5098da41f9ff9fb43dff55ab73874d7df382357a
