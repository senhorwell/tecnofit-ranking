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
Route::get('/deadlift', function () {
    return view('deadlift');
});
Route::get('/backsquat', function () {
    return view('backsquat');
});
Route::get('/benchpress', function () {
    return view('benchpress');
});
Route::get('/', function () {
    return view('deadlift');
});
