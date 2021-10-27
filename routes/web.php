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

	Route::get('/', [App\Http\Controllers\UserController::class, 'showLoginForm'])->name('login')->middleware('guest');
    
	Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

    Route::get('login/{provider}', [App\Http\Controllers\UserController::class, 'redirect'])->name('login.provider');
    Route::get('login/{provider}/callback', [App\Http\Controllers\UserController::class, 'handleProviderCallback']);

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('products', App\Http\Controllers\ProductController::class); 
        Route::get('inquiry/{id}', [App\Http\Controllers\InquiryController::class, 'inquiryForm'])->name('inquiry.form'); 
        Route::post('inquiry-store', [App\Http\Controllers\InquiryController::class, 'inquiryStore'])->name('inquiry.store'); 
    });
