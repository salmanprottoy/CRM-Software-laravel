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

// Route::get('/', function () {
//     return view('superAdmin.index');
// });

//SUPERADMIN
//superAdmin
Route::get('/superAdmin_home', 'superAdmin_homeController@index')->name('superAdmin.index');
Route::get('/superAdmin_home/superAdmin_list', 'superAdmin_homeController@superAdmin_show')->name('superAdmin.superAdmin');
Route::post('/superAdmin_home/superAdmin_list/create', 'superAdminController@superAdmin_create')->name('superAdmin.superAdmin.create');
Route::get('/superAdmin_home/superAdmin_list/search', 'superAdminController@search')->name('superAdmin.superAdmin.search');
// admin
Route::get('/superAdmin_home/admin_list', 'superAdmin_homeController@admin_show')->name('superAdmin.admin');
Route::post('/superAdmin_home/admin_list/create', 'AdminController@admin_create')->name('superAdmin.admin.create');
Route::get('/superAdmin_home/admin_list/edit/{id}', 'AdminController@show')->name('superAdmin.admin.show');
Route::post('/superAdmin_home/admin_list/edit/{id}', 'AdminController@update')->name('superAdmin.admin.update');
Route::get('/superAdmin_home/admin_list/delete/{id}', 'AdminController@destroy')->name('superAdmin.admin.destroy');
//subscriber
Route::get('/superAdmin_home/subscriber_list', 'superAdmin_homeController@subscriber_show')->name('superAdmin.subscriber');
Route::get('/superAdmin_home/subscriber_list/delete/{id}', 'SubscriberController@destroy')->name('superAdmin.subscriber.destroy');
Route::get('/superAdmin_home/subscriber_list/block/{id}', 'SubscriberController@block')->name('superAdmin.subscriber.block');
Route::get('/superAdmin_home/subscriber_list/unblock/{id}', 'SubscriberController@unblock')->name('superAdmin.subscriber.unblock');
//Package
Route::get('/superAdmin_home/package_list', 'superAdmin_homeController@package_show')->name('superAdmin.package');
Route::get('/superAdmin_home/package_list/edit', 'superAdmin_homeController@show')->name('superAdmin.package.show');
Route::post('/superAdmin_home/package_list/edit', 'superAdmin_homeController@update')->name('superAdmin.package.update');

//Accounting & Sells 
Route::get('/accountingSellsHome', 'accountingSellsController@index')->name('accountingSellsHome.index');
Route::get('/accountingSellsHome/Salary', 'accountingSellsController@showSalary')->name('accountingSellsHome.salary');
Route::get('/accountingSellsHome/Calendar', 'accountingSellsController@showCalendar')->name('accountingSellsHome.calendar');
Route::get('/accountingSellsHome/Report', 'accountingSellsController@showReport')->name('accountingSellsHome.report');
//customer
Route::get('/accountingSellsHome/Customer', 'accountingSellsController@showCustomer')->name('accountingSellsHome.customer');
Route::get('/accountingSellsHome/Customer/search', 'accountingSellsController@searchCustomer')->name('accountingSellsHome.customer.search');
Route::get('/accountingSellsHome/Customer/create', 'accountingSellsController@createCustomer')->name('accountingSellsHome.customer.create');;
Route::post('/accountingSellsHome/Customer/create', 'accountingSellsController@creatingCustomer')->name('accountingSellsHome.customer.creating');;
Route::get('/accountingSellsHome/Customer/edit/{id}', 'accountingSellsController@editCustomer')->name('accountingSellsHome.customer.edit');
Route::post('/accountingSellsHome/Customer/edit/{id}', 'accountingSellsController@updateCustomer')->name('accountingSellsHome.customer.update');
Route::get('/accountingSellsHome/Customer/delete/{id}', 'accountingSellsController@deleteCustomer')->name('accountingSellsHome.customer.delete');
Route::post('/accountingSellsHome/Customer/delete/{id}', 'accountingSellsController@deletingCustomer')->name('accountingSellsHome.customer.update');
//product
Route::get('/accountingSellsHome/Product', 'accountingSellsController@showProduct')->name('accountingSellsHome.product');
Route::get('/accountingSellsHome/Product/search', 'accountingSellsController@searchProduct')->name('accountingSellsHome.product.search');
Route::get('/accountingSellsHome/Product/create', 'accountingSellsController@createProduct')->name('accountingSellsHome.product.create');;
Route::post('/accountingSellsHome/Product/create', 'accountingSellsController@creatingProduct')->name('accountingSellsHome.product.creating');;
Route::get('/accountingSellsHome/Product/edit/{id}', 'accountingSellsController@editProduct')->name('accountingSellsHome.product.edit');
Route::post('/accountingSellsHome/Product/edit/{id}', 'accountingSellsController@updateProduct')->name('accountingSellsHome.product.update');
Route::get('/accountingSellsHome/Product/delete/{id}', 'accountingSellsController@deleteProduct')->name('accountingSellsHome.product.delete');
Route::post('/accountingSellsHome/Product/delete/{id}', 'accountingSellsController@deletingProduct')->name('accountingSellsHome.product.update');
//bankInfo
Route::get('/accountingSellsHome/BankInfo', 'accountingSellsController@showBankInfo')->name('accountingSellsHome.bankInfo');
Route::get('/accountingSellsHome/BankInfo/search', 'accountingSellsController@searchBankInfo')->name('accountingSellsHome.bankInfo.search');
Route::get('/accountingSellsHome/BankInfo/edit/{id}', 'accountingSellsController@editBankInfo')->name('accountingSellsHome.bankInfo.edit');
Route::post('/accountingSellsHome/BankInfo/edit/{id}', 'accountingSellsController@updateBankInfo')->name('accountingSellsHome.bankInfo.update');
//pdf
Route::get('/accountingSellsHome/Report/generate-pdf','accountingSellsController@generatePDF');