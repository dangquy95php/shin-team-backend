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

Route::get('/swaggers', 'SwaggerController@index');
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
        Route::get('/{id}/edit', 'CustomerController@update')->where('id', '[0-9]+')->name('update_customer');
        Route::post('/{id}/edit', 'CustomerController@updatePost')->where('id', '[0-9]+')->name('update_customer');
        Route::get('/{id}/delete', 'CustomerController@delete')->where('id', '[0-9]+')->name('delete_customer');
        Route::get('/search', 'CustomerController@search')->name('search_customer');
    });

    // Contact
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', 'ContactController@list')->name('admin_list_contact');
        Route::get('add', 'ContactController@add')->name('contact_add');
        Route::post('add', 'ContactController@addPost');
        Route::get('/{id}/edit', 'ContactController@update')->where('id', '[0-9]+')->name('update_contact');
        Route::post('/{id}/edit', 'ContactController@updatePost')->where('id', '[0-9]+')->name('update_contact');
        Route::get('/{id}/delete', 'ContactController@delete')->where('id', '[0-9]+')->name('delete_contact');
        Route::get('/search', 'ContactController@search')->name('search_contact');
    });
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});