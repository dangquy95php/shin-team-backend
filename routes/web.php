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
    return view('index');
});

Route::post('/', 'ContactController@postInfo')->name('contact');

Route::get('login', 'Admin\CustomerController@loginForm');
Route::post('login', 'Admin\CustomerController@loginCustomer');

// Admin
Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@dashboard')->name('dashboard');
    
    Route::group(['prefix' => 'customers'], function () {
        Route::get('/', 'CustomerController@listCustomer')->name('admin_list_customer');
        Route::get('add', 'CustomerController@addCustomer')->name('customer_add');
        Route::post('add', 'CustomerController@addCustomerPost');
    });
});
