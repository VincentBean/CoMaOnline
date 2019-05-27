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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('welcome');

// Route::prefix('categorie')->group(function () {
//     Route::get('', 'CategoryController@index')->name('home.category');
//     Route::get('{category}', 'CategoryController@category')->name('home.category.details');
// });

Route::prefix('producten')->group(function () {
    Route::get('', 'ProductsController@index')->name('home.products');
    Route::get('{category}', 'ProductsController@category')->name('home.category.details');
    Route::get('product/{id}', 'ProductsController@details')->name('home.product');
});
