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
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//  Item Routes (Seller)
Route::resource('/item', 'ItemController');
// View specific seller's stocks
Route::resource('/item/{items}/stock', 'SerialController');

// Catalog Route (Buyers & Sellers) 
Route::get('/catalog/{category_id}', 'ItemController@catalog_index')->name('catalog.index');

Route::get('/catalog/{item}/show', 'ItemController@catalog_show')->name('catalog.show');


// Cart Route
Route::post('/cart/{id}', 'CartController@store')->name('add.cart');

Route::get('/cart', 'CartController@index')->name('cart.index');

Route::delete('/cart/{id}', 'CartController@destroy');

Route::get('/cart/{id}/add', 'CartController@add')->name('add_quantity');

Route::get('/cart/{id}/minus', 'CartController@minus')->name('minus_quantity');

Route::get('/cart/checkout', 'CartController@checkout')->name('checkout');

Route::post('/cart/checkout/order', 'CartController@order')->name('order');


// Users Route

Route::resource('/users', 'UserController');

Route::get('/myaccount', 'UserController@myaccount')->name('myaccount');

Route::get('/myaccount/edit', 'UserController@edit_myaccount')->name('edit_myaccount');

Route::put('/myaccount/update', 'UserController@update_myaccount')->name('update_myaccount');

Route::get('/mytransactions', 'OrderController@mytransaction')->name('mytransaction');

Route::get('/mytransactions/{order}', 'OrderController@show_mytransaction')->name('show_mytransaction');

Route::get('/mytransactions/{order}/serials{item}', 'OrderController@mytransaction_serials')->name('mytransaction_serials');

// Admin Route

Route::get('/admin', 'AdminController@index');

Route::get('/userslist/{role}', 'UserController@user_home')->name('user.home');

Route::resource('/transactions', 'OrderController');
