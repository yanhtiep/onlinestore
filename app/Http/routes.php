<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
define('ASSETS_PATH', Config::get('constants.assets.frontendTemplate'));

// Route::get('/', function () {
    // return view('index');
// });

Route::get('routes', function() {
     \Artisan::call('route:list');
     return \Artisan::output();
});


Route::get('/', 'HomeController@index');
Route::get('/user/login', 'HomeController@getlogin');
Route::post('/user/login', 'HomeController@postlogin');
Route::get('/user/logout', 'HomeController@getlogout');
Route::get('/user-info', 'HomeController@getuserinfo');
Route::post('/user-info', 'HomeController@postuserinfo');
Route::post('/getProByCate', 'HomeController@getProByCate');
Route::get('/item',['as' => 'item', 'uses' => 'HomeController@item']);

Route::get('/stock-detail/{id}', 'DetailController@index');

Route::get('/stock-category-type/{id}', 'CategoryController@index');
Route::get('/item2',['as' => 'item2', 'uses' => 'CategoryController@item2']);

Route::get('/stock', 'StockController@index');


Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/remove/{id}', 'CartController@destroy');
Route::get('/cart/update/{id}/{qty}', 'CartController@update');
Route::get('/checkout', 'CartController@checkOut');

