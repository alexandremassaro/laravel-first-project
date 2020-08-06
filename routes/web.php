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


Route::view('/', 'home');

Route::get('contact', 'ContactFormController@create')->name('contact.create');
Route::post('contact', 'ContactFormController@store')->name('contact.store');

Route::view('about', 'about')->name('about');

// Route::get('customers', 'CustomersController@index');
// Route::get('customers/create', 'CustomersController@create');
// Route::post('customers', 'CustomersController@store');
// Route::get('customers/{customer}', 'CustomersController@show');
// Route::get('customers/{customer}/edit', 'CustomersController@edit');
// Route::patch('customers/{customer}', 'CustomersController@update');
// Route::delete('customers/{customer}', 'CustomersController@destroy');

// All that ^ can be replaced by
Route::resource('customers', 'CustomersController');

// Route::get('customers', function () {
//     return view('internals/customers');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::view('URI', 'viewName');

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/about', function () {
//     return view('about');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
