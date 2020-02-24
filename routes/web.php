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

Route::get('/','ApplicationController@index');
Route::get('/Application/{id}', 'ApplicationController@show');

Route::get('/order', 'OrderController@show') -> name('order');

Route::get('/categories', 'CategoryController@index') -> name('categories');
Route::get('/categories/{id}', 'CategoryController@show')-> name('category');

Route::get('/login', function () {
  return view('Auth.login');
}) -> name('login');
Route::get('/register', function () {
  return view('Auth.register');
}) -> name('register');
