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

Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => 'beta_keys', 'as' => 'beta_keys.'],
    function() : void{
        Route::get('/', 'BetaKeysController@index')->name('index');

        Route::group(['prefix' => 'ajax', 'as' => 'ajax.'],
            function() : void{
                Route::post('/create_key', 'Ajax\BetaKeysControllerAjax@store')->name('create_keys');
                Route::get('/get_key/{id?}', 'Ajax\BetaKeysControllerAjax@get')->name('get_keys');

            }
        );
    }
);

//TODO: Poprawić to by miało więcej sensu
Route::group(['prefix' => 'auth', 'as' => 'auth.'],
    function() : void{

        Route::get('/logout', 'LoginController@logout')->name('logout');
         Route::group(['prefix' => 'login', 'as' => 'login.'],
             function() : void{
                 Route::get('/', 'LoginController@index')->name('index');
                 Route::post('/login', 'LoginController@attemptLogin')->name('login');

             }
         );
    }
);
