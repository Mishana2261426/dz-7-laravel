<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/authors', 'AuthorsController@store');
Route::get('/authors', 'AuthorsController@index');
Route::put('/authors/{author}', 'AuthorsController@update');
Route::delete('/authors/{author}', 'AuthorsController@delete');

Route::post('/books', 'BooksController@store');
Route::get('/books', 'BooksController@index');
Route::put('/books/{book}', 'BooksController@update');
Route::delete('/books/{book}', 'BooksController@delete');