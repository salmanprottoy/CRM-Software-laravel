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
Route::get('/accountingSellsHome/Customer', 'accountingSellsController@showCustomer')->name('accountingSellsHome.customer');
Route::get('/accountingSellsHome/Product', 'accountingSellsController@showProduct')->name('accountingSellsHome.product');
Route::get('/accountingSellsHome/BankInfo', 'accountingSellsController@showBankInfo')->name('accountingSellsHome.bankInfo');
Route::get('/accountingSellsHome/Salary', 'accountingSellsController@showSalary')->name('accountingSellsHome.salary');
Route::get('/accountingSellsHome/Calendar', 'accountingSellsController@showCalendar')->name('accountingSellsHome.calendar');
Route::get('/accountingSellsHome/Report', 'accountingSellsController@showReport')->name('accountingSellsHome.report');