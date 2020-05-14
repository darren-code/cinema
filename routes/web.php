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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');

    /*
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin')->middleware('auth');
    */

    Route::get('/poster/{filename}', [
        'uses' => 'MovieController@poster',
        'as' => 'movie.poster'
    ]);

    Route::get('/booking', [
        'uses' => 'UserController@booking',
        // 'as' => 'profile'
    ]);

    Route::get('/profile', [
        'uses' => 'UserController@profile',
        'as' => 'profile'
    ]);

    Route::get('/profile/{filename}', [
        'uses' => 'UserController@profile_picture',
        'as' => 'user.profile'
    ]);

    Route::get('/signout', [
        'uses' => 'UserController@logout',
        'as' => 'signout',
    ]);
    
    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::get('/home', [
        'uses' => 'MovieController@home',
        'as' => 'home',
    ])->middleware('auth');

    Route::post('/signup', [
        'uses' => 'UserController@register', // Controller @ Function
        'as' => 'signup', // Identified As
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@login',
        'as' => 'signin',
    ]);

    Route::prefix('/admin')->group(function(){
        Route::middleware('auth:admin')->group(function(){
            // Dashboard
            Route::get('/', 'DashboardController@index');
            
            // Products
            Route::resource('/movies','MovieController');
            
            // Orders
            Route::resource('/order','OrderController');
            Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');
            Route::get('/pending/{id}','OrderController@pending')->name('order.pending');
            Route::get('/detail/{id}','OrderController@detail')->name('order.detail');
            
            // Users
            Route::resource('/users','UserController');

            // Logout
            Route::get('/logout','AdminUserController@logout');
        });

        // Admin Login
        Route::get('/login','AdminUserController@index');
        Route::post('/login','AdminUserController@store');

    });
});