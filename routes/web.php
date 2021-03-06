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

Route::get('/', function(){
    return view('main');
});
Route::get('/dashboard', 'DashboardController@index');

Route::get('/myassets', 'AssetController@myassets');
Route::get('/assets/search', 'AssetController@search');
Route::get("/filterCategory/{id}", 'CategoryController@filterCategory');
Route::get('/cart/return/confirm', 'CartController@showReturns');
Route::post('/cart/return', 'CartController@return');
Route::get("/transactionFilter/{id}", 'TransactionController@filter');
Route::get("/transactionType/{id}", 'TransactionController@type');
Route::post('/transactions/return', 'TransactionController@returnTransaction');
Route::put('/transactions/approveReturn', 'TransactionController@approveReturn');
Route::get("/profile/{id}", 'ProfileController@show');
Route::resource('assets', 'AssetController');
Route::resource('assetDetails','AssetDetailController');
Route::resource('categories', 'CategoryController');
Route::resource('transactions', 'TransactionController');
Route::resource('cart', 'CartController');

Auth::routes();
