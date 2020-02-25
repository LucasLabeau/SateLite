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
Auth::routes();

Route::get('/','ApplicationController@index');
Route::get('/application/{id}', 'ApplicationController@show') -> name('appShow');

Route::post('order', 'OrderController@store') -> name('order');

Route::get('/categories', 'CategoryController@index') -> name('categories');
Route::get('/categories/{id}', 'CategoryController@show')-> name('category');

Route::get('/login', function () {
  return view('auth.login');
}) -> name('login');
Route::get('/register', function () {
  return view('auth.register');
}) -> name('register');

Route::get('/search',function (Request $request) {
  if($request->has('search')){
    $application = Application::search($request->get('search'))->get();
  }else{
    $application = Application::get();
  }
   return view('website.appShow', compact('application'));
})->name('search');

// Buscador
//Route::post('search', function(){
//    $q = \Request::get('search');
//    $application = \App\Application::where('name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
//    if(count($application) > 0)
//        return view('website.appShow', compact('application'))->withDetails($application)->withQuery ( $q );
//    else return view('website.appShow')->withMessage('No se encontró la app');
//});
