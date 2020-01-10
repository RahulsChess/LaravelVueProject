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


// Route::post('formSubmit','FileController@formSubmit');
 //Route::post('formSubmitUpdate','FileController@update');
 Route::get('search/{keyword}','FileController@search');
 Route::get('products/{id}','FileController@show');
 Route::post('/formSubmitUpdate','FileController@update');
Route::get('/','FileController@List');
// Route::get('list','FileController@getUser');
// Route::get('edit/{id}','FileController@edit');
// Route::get('delete/{id}','FileController@destroy');

