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
Route::get('/', 'HomeController@index')->name('welcome');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('search', 'ProductsController@search')->name('search');

Route::prefix('producten')->group(function () {
    Route::get('', 'ProductsController@index')->name('home.products');
    Route::get('{category}', 'ProductsController@category')->name('home.category.details');
    Route::get('product/{id}', 'ProductsController@details')->name('home.product');
    Route::post('product/{id}/add', 'ShoppingCartController@addToCart')->name('home.cart.add');
});

Route::prefix('artikel')->group(function () {
    Route::get('{article}', 'ArticlesController@details')->name('home.article.details');
    Route::post('load_data', 'ArticlesController@load_data')->name('loadmore.load_data');
});

Route::prefix('profiel')->group(function () {
    Route::get('', 'CustomersController@index')->name('home.profiel');
});

Route::prefix('winkelwagen')->group(function () {
    Route::get('', 'ShoppingCartController@index')->name('home.cart');
    Route::post('update', 'ShoppingCartController@updateCart')->name('home.cart.update');
    Route::get('delete/{id}', 'ShoppingCartController@delete')->name('home.cart.delete');
    Route::get('delete', 'ShoppingCartController@emptyCart')->name('home.cart.deleteAll');
});

Route::prefix('bestellen')->group(function () {
    Route::get('bezorgmoment', 'OrderController@index')->name('home.order.moment');
    Route::post('bezorgmoment', 'OrderController@deliveryMoment')->name('home.order.moment');
    Route::get('bevestigen', 'OrderController@confirm')->name('home.order.confirm');
    Route::post('bevestigen', 'OrderController@confirmOrder')->name('home.order.confirm');
    Route::get('bevestigt', 'OrderController@finished')->name('home.order.finished');

});

Route::prefix('dashboard')->middleware('role:admin')->group(function () {
    Route::get('', 'DashboardController@index')->name('dashboard.index');
    Route::get('/nieuws', 'DashboardController@newsArticles')->name('dashboard.articles');
    Route::get('/categorieen', 'DashboardController@categories')->name('dashboard.categories');
    Route::get('/gebruikers', 'DashboardController@users')->name('dashboard.users');
});

Route::prefix('dashboard/nieuws')->middleware('role:admin')->group(function () {
    Route::get('create', 'ArticlesController@create')->name('dashboard.articles.create');
    Route::post('create', 'ArticlesController@store')->name('dashboard.articles.create');
    Route::get('{id}/edit', 'ArticlesController@edit')->name('dashboard.articles.edit');
    Route::put('{id}/edit', 'ArticlesController@update')->name('dashboard.articles.edit');
    Route::post('delete', 'ArticlesController@delete')->name('dashboard.articles.delete');
});

Route::prefix('dashboard/categorieen')->middleware('role:admin')->group(function () {
    Route::get('{id}/edit', 'CategoryController@edit')->name('dashboard.categories.edit');
    Route::put('{id}/edit', 'CategoryController@update')->name('dashboard.categories.edit');
});

Route::prefix('dashboard/aanbiedingen')->middleware('role:admin')->group(function () {
    Route::get('edit', 'PromotionsController@edit')->name('dashboard.promotions.edit');
    Route::put('edit', 'PromotionsController@update')->name('dashboard.promotions.edit');
});

Route::prefix('dashboard/gebruikers')->middleware('role:admin')->group(function () {
    Route::get('create', 'UsersController@create')->name('dashboard.users.create');
    Route::post('create', 'UsersController@store')->name('dashboard.users.create');
    Route::get('{id}/edit', 'UsersController@edit')->name('dashboard.users.edit');
    Route::put('{id}/edit', 'UsersController@update')->name('dashboard.users.edit');
    Route::put('{id}/edit/role', 'UsersController@updateRole')->name('dashboard.users.role');
    Route::post('delete', 'UsersController@delete')->name('dashboard.users.delete');
});

Route::get('/api/address/{zipcode}/{number}', 'Api\AddressController@getAddress')->name('api.address');
