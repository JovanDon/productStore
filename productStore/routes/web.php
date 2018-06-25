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
    return view('auth/login');
});

Auth::routes();
Route::get('/edit/{id}', 'HomeController@edit')->name('edit'); 
   
Route::get('/add', 'HomeController@add')->name('add');
Route::get('/view', 'HomeController@view')->name('view');
Route::post('/addaction', 'PdtController@addproduct');
Route::post('/editaction', 'PdtController@editproduct');
Route::post('/deleteaction', 'PdtController@destroy');