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


//BRANCHES
Route::get('/branches', 'BranchController@index');                  //list
Route::post('/branch', 'BranchController@store');                   //insert

//ITEMS
Route::get('/items', 'ItemController@index');                       //list
Route::post('/item', 'ItemController@store');                       //insert

//SERVER
Route::get('/servers', 'ServerController@index');                   //list
Route::post('/server', 'ServerController@store');                   //insert

//CASHIER
Route::get('/cashiers', 'CashierController@index');                 //list
Route::post('/cashier', 'CashierController@store');                 //insert

//SERVICE AND TAX
Route::get('/servicestaxes', 'ServiceTaxController@index');         //list
Route::post('/servicetax', 'ServiceTaxController@store');           //insert

//TRANSACTION
Route::get('/transactions', 'TransactionController@index');         //list
Route::post('/billidk/{id}', 'TransactionController@store');        //insert

//BILL
Route::get('/bills', 'BillController@index');                       //list
Route::post('/bills', 'BillController@store');                      //insert
Route::get('/billidk/{id}', 'BillController@bill');                 //particular
Route::post('/billidk/{id}', 'BillController@close_bill');          //update
//BILL FOR HISTORY
Route::get('/histories', 'BillController@history');                 //list
Route::get('/historydate/{date}', 'BillController@history_date');   //particular
Route::get('/historybill/{id}', 'BillController@history_bill');
