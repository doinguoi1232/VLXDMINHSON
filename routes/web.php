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

Route::get('/categories', 'CategoriesController@index')->name('indexCategories');
Route::get('/create/categories', 'CategoriesController@create')->name('getCategories');
Route::post('/create/categories', 'CategoriesController@store')->name('postCategories');
Route::get('/products', 'ProductsController@index')->name('indexProducts');
Route::get('/create/products', 'ProductsController@create')->name('getProducts');
Route::post('/create/products', 'ProductsController@store')->name('postProducts');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
