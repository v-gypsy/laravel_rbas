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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@createpo')->name('createpo');
Route::get('/warehouses', 'HomeController@warehouselist')->name('warehouselist');
Route::post('/purchaseorder', 'HomeController@purchaseorder')->name('purchaseorder');
Route::post('/autocomplete', 'HomeController@search')->name('autocomplete');
Route::post('/autocomplete2', 'HomeController@search2')->name('autocomplete2');
