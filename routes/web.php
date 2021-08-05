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
Route::get('/deadlift', 'App\Http\Controllers\RankingController@getDeadlift')->name('deadlift');
Route::get('/backsquat', 'App\Http\Controllers\RankingController@getBacksquat')->name('backsquat');
Route::get('/benchpress', 'App\Http\Controllers\RankingController@getBenchpress')->name('benchpress');

Route::post('/deadlift/enviar', 'App\Http\Controllers\RankingController@setDeadlift')->name('deadlift.registra');
Route::post('/backsquat/enviar', 'App\Http\Controllers\RankingController@setBacksquat')->name('backsquat.registra');
Route::post('/benchpress/enviar', 'App\Http\Controllers\RankingController@setBenchpress')->name('benchpress.registra');

Route::get('/', 'App\Http\Controllers\RankingController@getDeadlift')->name('home');

