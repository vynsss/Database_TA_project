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

Route::get('/branches', 'BranchController@index');
Route::post('/branch', 'BranchController@store');

Route::get('/items', 'ItemController@index');
Route::post('/item', 'ItemController@store');

Route::get('/bills', 'BillController@index');
Route::post('/bills', 'BillController@store');
Route::get('/billidk/{id}', 'BillController@bill');

Route::get('/histories', 'BillController@history');
Route::get('/historydate/{date}', 'BillController@history_date');

Route::get('/servers', 'ServerController@index');
Route::post('/server', 'ServerController@store');

Route::get('/cashiers', 'CashierController@index');
Route::post('/cashier', 'CashierController@store');

Route::get('/servicestaxes', 'ServiceTaxController@index');
Route::post('/servicetax', 'ServiceTaxController@store');

Route::get('/transactions', 'TransactionController@index');
Route::post('/billidk/{id}', 'TransactionController@store');
