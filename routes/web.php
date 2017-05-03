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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'generateCheese'], function () {
    Route::get('/cheese', ['uses' => 'PZCheeseController@index']);
    Route::post('/cheese', ['as' => 'app.cheese', 'uses' => 'PZCheeseController@create']);
});
Route::group(['prefix' => 'generateBase'], function () {
    Route::get('/base', ['uses' => 'PZBaseController@index']);
    Route::post('/base', ['as' => 'app.base', 'uses' => 'PZBaseController@create']);
});
Route::group(['prefix' => 'generateIngredients'], function () {
    Route::get('/ingredients', ['uses' => 'PZIngredientsController@index']);
    Route::post('/ingredients', ['as' => 'app.ingredients', 'uses' => 'PZIngredientsController@create']);
});
Route::group(['prefix' => 'generateOrders'], function () {
    Route::get('/orders', ['uses' => 'PZOrdersController@index']);
    Route::post('/orders', ['as' => 'app.orders', 'uses' => 'PZOrdersController@create']);
});
Route::group(['prefix' => 'showOrders'], function () {
    Route::get('/orders', ['uses' => 'PZOrdersController@showData']);
});


Route::get('/calories', ['uses' => 'PZOrdersController@countCalories']);
