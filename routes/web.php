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

Route::group(['prefix' => 'showOrders'], function () {
    Route::get('/orders', ['uses' => 'PZOrdersController@showData']);
});

Route::get('/calories', ['uses' => 'PZOrdersController@countCalories']);
Route::get('/allOrders', ['uses' => 'PZOrdersController@showAllOrders']);

Route::group(['prefix' => 'pizza'], function () {
    Route::get('/', ['uses' => 'PZOrdersController@index']);
    Route::get('/create', ['uses' => 'PZOrdersController@create']);
    Route::post('/create', ['as' => 'app.orders', 'uses' => 'PZOrdersController@store']);

    Route::group(['prefix' => 'service'], function () {
        Route::get('{id}', ['uses' => 'PZOrdersController@show']);
        Route::get('{id}/edit', ['as' => 'app.orderEdit', 'uses' => 'PZOrdersController@edit']);
        Route::post('{id}/edit', ['as' => 'app.OrderEdit', 'uses' => 'PZOrdersController@update']);
        Route::get('{id}', ['as' => 'app.orderDelete', 'uses' => 'PZOrdersController@destroy']);
    });
});
