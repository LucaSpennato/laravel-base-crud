<?php

use App\Http\Controllers\ComicController;
use App\Http\Controllers\HomeController;
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

Route::get('/', 'HomeController@index')->name('admin');
Route::resource('/comic', 'ComicController');

// Route::get('/comic', 'ComicController@index')->name('home');
// Route::get('/comic/{comic}', 'ComicController@show' )->name('comic');

