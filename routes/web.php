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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/addMuseum', 'AdminController@addMuseum')->name('addMuseum');
Route::post('/uploadMap', 'AdminController@uploadMap')->name('uploadMap');
Route::get('/museum', 'HomeController@downloadMap')->name('downloadMap');
Route::get('/QR', 'HomeController@generateQR')->name('generateQR');

//Route::get('/home', 'HomeController@index')->name('home');
