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

Route::get('/', 'Home@index')->name('index');

Route::group(['prefix' => 'beta_keys'],
    function() : void{
        Route::get('/', 'BetaKeys@index')->name('beta_keys');
        Route::group(['prefix' => 'ajax'],
            function() : void{
                Route::post('/create_key', 'Ajax\BetaKeysAjax@store')->name('create_keys');
                Route::get('/get_key/{id?}', 'Ajax\BetaKeysAjax@get')->name('get_keys');

            }
        );
    }
);
