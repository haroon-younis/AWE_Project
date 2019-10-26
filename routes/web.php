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

Route::post('/car/{car}/todos', 'CarTodoController@store');
Route::post('/completed-todos/{todo}', 'CompletedTodoController@store');
Route::delete('/completed-todos/{todo}', 'CompletedTodoController@destroy');

Route::resource('/cars', 'CarController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
