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
    return view('welcome');
});

Route::get('/postal_codes/search',
           ['App\Http\Controllers\PostalCodeController', 'search'])
       ->name('postal_codes.search');

Route::resource('postal_codes', 'App\Http\Controllers\PostalCodeController');
