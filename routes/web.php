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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::resource('books', 'BookController');
    Route::resource('students', 'StudentController');
    Route::resource('librarians', 'LibrarianController');
    Route::resource('burrows', 'BurrowController');

    Route::post('students/search', 'SearchController@students');
    Route::post('librarians/search', 'SearchController@librarians');
});

Route::get('{id}/pay', 'HomeController@pay');
Route::post('/checkout', 'HomeController@checkout');
Route::post('/comment', 'CommentController@store');
