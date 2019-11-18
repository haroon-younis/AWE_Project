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



Route::get('/', 'PagesController@homePage');
Route::get('/about', 'PagesController@aboutPage');

Route::get('/todos', 'CarTodoController@index');

Route::post('/cars/{car}/todos', 'CarTodoController@store');
Route::post('/completed-todos/{todo}', 'CompletedTodoController@store');
Route::delete('/completed-todos/{todo}', 'CompletedTodoController@destroy');

Route::resource('/cars', 'CarController');

//Route::resource('/favourites', 'FavouritesController');

Route::get('/favourites', 'FavouritesController@index');
Route::get('/favourites/{favourites}', 'FavouritesController@show');
Route::post('/favourites/{car}', 'FavouritesController@store');
Route::delete('/favourites/{favourites}', 'FavouritesController@destroy');

Route::get('/tags', 'TagController@index');
Route::get('/tags/create', 'TagController@create');
Route::get('/tags/{tags}', 'TagController@show');
Route::post('/tags', 'TagController@store');
Route::delete('/tags/{tags}', 'TagController@destroy');
Route::get('/cars/tags/{tag}', 'TagController@indexByTags');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
