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
    return view('addProduct');
});

Route::post('/productAdd','App\Http\Controllers\ProductController@store');
Route::get('/productView','App\Http\Controllers\ProductController@index');
Route::get('/productEdit/{id}','App\Http\Controllers\ProductController@edit');
Route::post('/productUpdate/{id}','App\Http\Controllers\ProductController@productUpdate');

Route::get('/Customer','App\Http\Controllers\CustomerController@create');
Route::post('/customerAdd','App\Http\Controllers\CustomerController@store');
Route::get('/customerView','App\Http\Controllers\CustomerController@index');
Route::get('/customerEdit/{id}','App\Http\Controllers\CustomerController@edit');
Route::post('/customerUpdate/{id}','App\Http\Controllers\CustomerController@customerUpdate');

Route::get('/Freeissues','App\Http\Controllers\FreeissuesController@create');
Route::get('/productSelect','App\Http\Controllers\FreeissuesController@productSelect');
Route::post('/freeissuesAdd','App\Http\Controllers\FreeissuesController@store');
Route::get('/FreeissuesView','App\Http\Controllers\FreeissuesController@index');
Route::get('/freeissuesEdit/{id}','App\Http\Controllers\FreeissuesController@edit');
Route::post('/freeissuesUpdate/{id}','App\Http\Controllers\FreeissuesController@freeissuesUpdate');

Route::get('/Invoice','App\Http\Controllers\InvoiceController@create');
Route::post('/addProdectItem','App\Http\Controllers\InvoiceController@store');
Route::delete('remove-from-cart','App\Http\Controllers\InvoiceController@remove');