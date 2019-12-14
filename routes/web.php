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

Route::get('/', 'PagesController@homePage')->name('index');
Route::get('/about', 'PagesController@aboutPage')->name('about.index');

Route::get('/todos/{todo}', 'CarTodoController@index')->name('todo.index');

Route::post('/cars/{car}/todos', 'CarTodoController@store');
Route::post('/completed-todos/{todo}', 'CompletedTodoController@store');
Route::delete('/completed-todos/{todo}', 'CompletedTodoController@destroy');

Route::resource('/cars', 'CarController');

//Route::resource('/favourites', 'FavouritesController');

Route::get('/favourites', 'FavouritesController@index')->name('fav.index');
Route::get('/favourites/{favourites}', 'FavouritesController@show');
Route::post('/favourites/{car}', 'FavouritesController@store');
Route::delete('/favourites/{favourites}', 'FavouritesController@destroy');

Route::get('/tags', 'TagController@index')->name('tags.index');
Route::get('/tags/create', 'TagController@create');
Route::get('/tags/{tags}', 'TagController@show');
Route::post('/tags', 'TagController@store');
Route::delete('/tags/{tags}', 'TagController@destroy');
Route::get('/cars/tags/{tag}', 'TagController@indexByTags');


Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login.github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('cars/{car}/mail', 'CarController@mail')->name('car.mail'); // can see the mail sent to user in browser


Route::fallback(function () {
    return view('fallback', [
        'message' => 'You have entered an invalid url'
    ]);
});

