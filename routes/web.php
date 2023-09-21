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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/all', 'HomeController@all')->name('all');
Route::get('/food', 'HomeController@food')->name('food');
Route::get('/drink', 'HomeController@drink')->name('drink');
Route::get('/cloth', 'HomeController@cloth')->name('cloth');
Route::get('/hotel', 'HomeController@hotel')->name('hotel');
Route::get('/traffic', 'HomeController@traffic')->name('traffic');
Route::get('/educate', 'HomeController@educate')->name('educate');
Route::get('/play', 'HomeController@play')->name('play');
Route::get('/regular', 'HomeController@regular')->name('regular');
Route::get('/work', 'HomeController@work')->name('work');
Route::get('/bonus', 'HomeController@bonus')->name('bonus');
Route::get('/prize', 'HomeController@prize')->name('prize');
Route::get('/create', 'HomeController@create')->name('create');
Route::post('/store', 'HomeController@store')->name('store');
Route::get('{record}/edit', 'HomeController@edit')->name('edit');
Route::put('{record}/update', 'HomeController@update')->name('update');
Route::get('{record}/destroy', 'HomeController@destroy')->name('destroy');
