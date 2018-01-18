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

// Route::get('/', function () {
//     return view('master');
// });

Route::get('/', 'ProductsController@index')->name('home');


Route::get('/contact', 'PagesController@contact');


// Route::post('/products', 'ProductsController@store');
// Route::get('/products', 'ProductsController@index');
// Route::get('/products/{id}', 'ProductsController@show');
// Route::get('/products/create', 'ProductsController@create');

Route::resource('products', 'ProductsController');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
