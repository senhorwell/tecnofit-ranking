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

Route::get('/', function () {
    return view('deadlift')->name('home');
});
