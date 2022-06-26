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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article/{uri}', 'ArticleController@detail');

Route::get('/finansial', function () {
    return view('static.finansial');
});
Route::get('/karir-&-sukses', function () {
    return view('static.karir-&-sukses');
});

Route::get('/gaya-hidup', function () {
    return view('static.gaya-hidup');
});

