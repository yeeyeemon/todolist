<?php

use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')->name('admin.')->namespace('Backend')->middleware('auth:admin_user')->group(function(){
    Route::get('/','PageController@home')->name('home');

    /* Admin User */
    Route::get('/admin_user_ssd','AdminUserController@ssd')->name('admin-ssd');
    Route::resource('/admin-user-management','AdminUserController');

    // User
    Route::get('/user_ssd','UserController@ssd')->name('user-ssd');
    Route::resource('/user-management','UserController');

    //wallet
    Route::get('/wallet','WalletController@index')->name('wallet.index');
    Route::get('/wallet_ssd','WalletController@ssd')->name('wallet-ssd');

});


