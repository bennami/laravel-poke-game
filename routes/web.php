<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/catch', 'CatchController@index')->name('catch');
Route::post('/catchOrNot', 'CatchOrNotController@index')->name('catchOrNot');
Route::get('/inventory', 'InventoryController@index')->name('inventory');
Route::post('/buy', 'StoreController@buy')->name('buy');
Route::post('/sell', 'StoreController@sell')->name('sell');
Route::get('/store', 'StoreController@display')->name('store');


