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
// Route::get('/register', 'RegisterController@showCustomRegForm');
Auth::routes();
Route::get('/', function(){
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard.index');
});
// Route::put('/transactions/{$id}/reject/', 'TransactionController@reject');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/myassets', 'AssetController@myassets');
Route::resource('assets', 'AssetController');
Route::resource('assetDetails','AssetDetailController');
Route::resource('categories', 'CategoryController');
// Route::get('transactions/assign', 'TransactionController@assign');

Route::resource('transactions', 'TransactionController');
// Route::post('/cart', 'CartController@store');
Route::resource('cart', 'CartController');

