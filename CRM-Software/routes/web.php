<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;



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
	return view('landing.landing');
});
// Route::get('/login', function () {
//     return view('login.index');
// });
Route::get('/getstarted', 'RegisterController@getstarted')->name('getstarted');
// Route::get('/getstarted/register/{package}', 'SslCommerzPaymentController@exampleEasyCheckout')->name('getstarted.register');
Route::get('/getstarted/register/{package}', 'RegisterController@register')->name('getstarted.register');
Route::post('/getstarted/register/coupon', 'RegisterController@apply_coupon')->name('getstarted.coupon');
Route::get('/getstarted/register/coupon/remove', 'RegisterController@remove_coupon')->name('coupon.remove');
Route::get('/register/manager', 'RegisterController@manager_register')->name('register');
Route::get('/register/manager/tran_id_search', 'RegisterController@tran_id_search')->name('register.tran_id.search');
Route::post('/register/manager', 'RegisterController@manager_register_complete')->name('register.done');
Route::get('/register/manager/manager_search', 'RegisterController@manager_search')->name('register.manager.search');
Route::get('/register/manager/uname_search', 'RegisterController@uname_search')->name('register.uname.search');
Route::get('/login/admin', 'AdminloginController@index')->name('login.index.admin');
Route::post('/login/admin', 'AdminloginController@verify')->name('login.verify.admin');
Route::get('/logout/admin', 'AdminloginController@logout')->name('logout.admin');


// Route::get('/email', function () {
// 	Mail::to('rayhanmahi999@gmail.com')->send(new PaymentConfirmationMail());
// 	return new PaymentConfirmationMail();
// });


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

//SUPERADMIN

Route::group(['middleware' => ['superadmin_sess']], function () {
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

	Route::get('/superAdmin_home/package_list/edit', 'PackageController@show')->name('superAdmin.package.show');
	Route::post('/superAdmin_home/package_list/edit', 'PackageController@update')->name('superAdmin.package.update');

	// Route::get('/superAdmin_home/package_list/edit', 'superAdmin_homeController@show')->name('superAdmin.package.show');
	// Route::post('/superAdmin_home/package_list/edit', 'superAdmin_homeController@update')->name('superAdmin.package.update');
	//Report
	Route::get('/superAdmin_home/report', 'superAdmin_homeController@report_show')->name('superAdmin.report');
	Route::get('/superAdmin_home/report/download/{name}', 'AdminReportController@download')->name('report.download');

	//coupon
	Route::get('/superAdmin_home/coupon', 'superAdmin_homeController@coupon')->name('superAdmin.coupon');
});








Route::get('/login', 'LoginController@index')->name('login');
//marketing
Route::group(['middleware' => ['checksession']], function () {
	Route::get('/markethome/profile', 'MarkethomeController@profile')->name('markethome.profile');
	Route::post('/markethome/profile', 'MarkethomeController@profileupdate');
	Route::resource('/markethome', 'MarkethomeController')->names([
		'index' => 'markethome.index',
		'update' => 'markethome.update'
	]);
	Route::get('/email/{table}/{id}', 'MarketUserController@sendmails')->name('market.mail');
	Route::post('/import/{table}', 'ImportController@import')->name('import.csv');
	Route::get('/chart/{type}', 'chartsController@index');
	Route::get('/chart/download/{type}', 'chartsController@downloadcharts')->name('charts.pdf');
	Route::get('/marketuser/pdf/{table}', 'MarketUserController@loadpdf')->name('marketuser.pdf');
	Route::get('/marketuser/search/{table}', 'MarketUserController@search')->name('live_search.action');
	Route::post('/marketuser/create', 'MarketUserController@insert');
	Route::get('/marketuser/showinfo/{table}/{id}', 'MarketUserController@showinfo')->name('marketuser.profile');
	Route::post('/marketuser/showinfo/{table}/{id}', 'MarketUserController@updateinfo');
	Route::get('/marketuser/delete/{table}/{id}', 'MarketUserController@deleteuser')->name('marketuser.delete');
	Route::get('/marketuser/upgradestatus/{id}', 'MarketUserController@upgradestatus')->name('marketuser.upgradestatus');
	Route::resource('/marketuser', 'MarketUserController');
});
 //marketing
