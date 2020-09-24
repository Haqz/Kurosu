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
    }
);
Route::group(['prefix' => 'ajax', 'as' => 'ajax.'],
    function() : void {
        Route::group(['prefix' => 'beta_keys', 'as' => 'beta_keys.'],
            function() : void{
                Route::post('/create_key', 'Ajax\BetaKeysControllerAjax@store')->name('create_keys');
                Route::get('/get_key/{id?}', 'Ajax\BetaKeysControllerAjax@get')->name('get_keys');
            }
        );
        Route::group(['prefix' => 'user', 'as' => 'user.'],
            function() : void{
                Route::get('/get_scores/{user_id?}', 'Ajax\UserProfileControllerAjax@getScores')->name('get_scores');
            }
        );
    }
);
Route::group(['prefix' => 'user', 'as' => 'user.'],
    function() : void{
        Route::get('/{id?}', 'User\ProfileController@index')->name('index');
        Route::post('/test', 'User\ProfileController@test')->name('test');
    }
);

//TODO: Poprawić to by miało więcej sensu
Route::group(['prefix' => 'auth', 'as' => 'auth.'],
    function() : void{

        Route::get('/logout', ['middleware' => 'auth', 'uses' => 'AuthController@logout'] )->name('logout');
         Route::group(['prefix' => 'login', 'as' => 'login.'],
             function() : void{
                 Route::get('/', 'AuthController@loginIndex')->name('index');
                 Route::post('/login', 'AuthController@attemptLogin')->name('login');

             }
         );
         Route::group(['prefix' => 'register', 'as' => 'register.'],
             function() : void{
                 Route::get('/', 'AuthController@registerIndex')->name('index');
                 Route::post('/login', 'AuthController@attemptRegister')->name('register');

             }
         );
    }
);
Route::group(['prefix' => 'admin', 'as' => 'admin.'],
    function() : void{
        Route::group(['prefix' => 'panel', 'as' => 'panel.'],
            function() : void{
                Route::get('/', 'AuthController@loginIndex')->name('index');
            }
        );
    }
);
