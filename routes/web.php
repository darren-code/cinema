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

    // User Panel
    Route::middleware('auth')->group(function(){
        Route::get('/', [
            'uses' => 'MovieController@home',
            'as' => 'home',
        ]);

        /*
        Route::get('/home/{branch}', [
            'uses' => 'MovieController@home_location',
            'as' => 'location',
        ]);
        */

        Route::get('/movie', [
            'uses' => 'MovieController@movie',
            'as' => 'movie'
        ]);

        Route::get('/movie/{id}', [
            'uses' => 'MovieController@details',
            'as' => 'movie.details'
        ]);

        Route::get('/movie/{id}/{time}', [
            'uses' => 'MovieController@seats',
            'as' => 'movie.seat'
        ]);

        Route::get('/profile', [
            'uses' => 'UserController@profile',
            'as' => 'profile'
        ]);
    
        Route::get('/profile/{filename}', [
            'uses' => 'UserController@profile_picture',
            'as' => 'user.profile'
        ]);

        Route::get('/poster/{filename}', [
            'uses' => 'MovieController@poster',
            'as' => 'movie.poster'
        ]);

        Route::get('/booking', [
            'uses' => 'UserController@booking',
            'as' => 'booking'
        ]);


        Route::get('/signout', [
            'uses' => 'UserController@logout',
            'as' => 'signout',
        ]);


    });

    // Route::get('/', function () {
    //     return redirect('login');
    // }); 

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    
    Route::get('/register', function () {
        return view('register');
    })->name('register');

    // Route::get('/about',function(){
    //     return view('about');
    // });

    Route::post('/signup', [
        'uses' => 'UserController@register', // Controller @ Function
        'as' => 'signup', // Identified As
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@login',
        'as' => 'signin',
    ]);


    // Admin Panel
    Route::prefix('/admin')->group(function(){
        Route::middleware('auth:admin')->group(function(){
            // Dashboard
            Route::get('/', 'DashboardController@index');
            
            // Studio
            Route::resource('/studio','StudioController');
            Route::get('/studio/details/{id}','StudioController@details')->name('studio.details');
            Route::get('/studio/seat/{id}/time/{time}','StudioController@seat')->name('studio.seat');
            Route::get('/studio/create','StudioController@create')->name('studio.create');
            Route::post('/studio/create','StudioController@store');

            // Studio Allocation
            Route::resource('/playing','PlayingController');
            Route::get('/playing/details/{id}','PlayingController@details')->name('playing.details');
            Route::get('/playing/create','PlayingController@create')->name('playing.create');

            // Airtime
            Route::resource('/showtime', 'ShowtimeController');

            // Branch
            Route::resource('/branch', 'BranchController');

            // Movie
            Route::resource('/movies','MovieController');
            
            // Orders
            Route::resource('/order','OrderController');
            // Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');
            // Route::get('/pending/{id}','OrderController@pending')->name('order.pending');
            // Route::get('/detail/{id}','OrderController@detail')->name('order.detail');
            
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