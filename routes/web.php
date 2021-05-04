<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\DatabaseControllerold;
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

Route::get('/', 'App\Http\Controllers\DatabaseController@HomeView')->name('home');

Route::get('/dbstart', 'App\Http\Controllers\DatabaseController@CreateDB');

Route::get('/basket', 'App\Http\Controllers\DatabaseController@BasketView');

Route::get('/purchase', 'App\Http\Controllers\DatabaseController@purchase');

Route::get('/complete', 'App\Http\Controllers\DatabaseController@complete');
