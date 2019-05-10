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
    return view('login.login');
});

Auth::routes();
//Auth::routes([ 'register' => false ]);

Route::get('/home', 'HomeController@index')->name('home');
Route::Resource('categories', 'CategoryController');
Route::Resource('products', 'ProductController');
Route::Resource('invoices', 'invoiceController');
Route::Resource('returninfos', 'ReturninfoController');
Route::get('/findPrice','ProductController@findPrice');
Route::get('/invoiceInformation/','ReturninfoController@invoiceInformation');

Route::Resource('employees', 'EmployeeController')->middleware('role:admin');
Route::get('/generate-Pdf/{id}','HomeController@generatePDF');


