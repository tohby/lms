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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::resource('books', 'BookController');
    Route::resource('students', 'StudentController');
    Route::resource('librarians', 'LibrarianController');
    Route::resource('burrows', 'BurrowController');

    Route::post('students/search', 'SearchController@students');
    Route::post('books/search', 'SearchController@books');
    Route::post('librarians/search', 'SearchController@librarians');
});

Route::post('/comment', 'CommentController@store');
