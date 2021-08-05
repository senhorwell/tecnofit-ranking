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

Route::delete('/deadlift/delete', 'App\Http\Controllers\RankingController@deleteDeadlift')->name('deadlift.delete');
Route::delete('/backsquat/delete', 'App\Http\Controllers\RankingController@deleteBacksquat')->name('backsquat.delete');
Route::delete('/benchpress/delete', 'App\Http\Controllers\RankingController@deleteBenchpress')->name('benchpress.delete');

Route::get('/', 'App\Http\Controllers\RankingController@getDeadlift')->name('home');

