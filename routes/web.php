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

Route::get('/blog', function () {
    return view('temp.blog', ['name' => 'blog']);
});

Route::get('/senbud', function () {
    return view('temp.senbud', ['name' => 'senbud']);
});

Route::get('/pnk', function () {
    return view('temp.pnk', ['name' => 'pnk']);
});

Route::get('/page', function () {
    return view('page', ['name' => 'pnk']);
});

Route::get('/depor', function () {
    return view('temp.depor', ['name' => 'depor']);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
