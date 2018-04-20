<?php

use App\Http\Controllers\Api\Api;
use App\Http\Controllers\Controller;

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

Route::get('/articles/cart/{id}', 'ArticleController@addToCart');
Route::get('/notifications/{id}', 'NotificationController@destroy');

Route::get('/ideas/transform/{id}', 'IdeaController@ideaEvent');
Route::get('/ideas/view/{id}', 'IdeaController@view');

Route::get('/idea/private/{id}', 'IdeaController@private');
Route::get('/idea/unprivate/{id}', 'IdeaController@unPrivate');

Route::resource('events','EventController');

Route::resource('comments','CommentController');

Route::resource('eventimages','ImageEventController');

Route::resource('images','ImageController');

Route::resource('registereds','RegisteredController');

Route::resource('votes','VoteController');

Route::resource('likes','LikeController');

Route::resource('priceFilter','ArticleController');

Route::get('/priceFilter', 'ArticleController@priceFilter');

Route::get('/api/events/{id}', 'Api\EventController@show');
Route::get('/api/articles/{id}', 'Api\ArticleController@show');
Route::get('/api/ideas/{id}', 'Api\IdeaController@show');

Route::get('/api/ideas', 'Api\IdeaController@showAll');
Route::get('/api/events', 'Api\EventController@showAll');
Route::get('/api/articles', 'Api\ArticleController@showAll');

Route::get('/api/{value}', 'Api\ApiController@show');

Route::get('/atricles/cart', 'ArticleController@showCart');

Route::get('/setCookie','CartController@reset');

Route::get('donwload-csv/{id}', 'EventController@downloadCSV');
Route::get('donwload-pdf/{id}', 'EventController@downloadPDF');

Route::get('eventimages/delete/{id}', 'ImageEventController@delete');

Route::get('/soldupdate', 'CartController@soldUpdate');






