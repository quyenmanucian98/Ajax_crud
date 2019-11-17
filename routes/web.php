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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('customers')->group(function (){
    Route::get('/list','CustomerController@index')->name('customers.list');
    Route::post('/add','CustomerController@add')->name('customers.add');
    Route::post('/search','CustomerController@search')->name('customers.search');
    Route::get('/{id}/delete','CustomerController@delete')->name('customers.delete');
    Route::post('/{id}/update','CustomerController@update')->name('customers.update');

});
