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

        Route::post('/search', [
            'uses' => 'MovieController@browse',
            'as' => 'search',
        ]);

        Route::get('/browse', [
            'uses' => 'MovieController@browse_movies',
            'as' => 'browse',
        ]);

        Route::get('/movie/{branch}', [
            'uses' => 'MovieController@movie',
            'as' => 'movie'
        ]);

        Route::get('/movie/{branch}/{id}', [
            'uses' => 'MovieController@details',
            'as' => 'movie.details'
        ]);

        Route::get('/movie/{branch}/{id}/{time}', [
            'uses' => 'MovieController@seats',
            'as' => 'movie.seat'
        ]);

        Route::get('/profile/edit/{id}', [
            'uses' => 'UserController@edit',
            'as' => 'user.edit'
        ]);

        // Route::post('profile/update','UserController@update');

        Route::get('/profile/{id}', [
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
            Route::get('/studio/seat/{id}/time/{time}','StudioController@seat')->name('studio.seat');
            // Route::get('/studio/details/{id}','StudioController@details')->name('studio.details');

            // Studio Allocation
            Route::resource('/playing','PlayingController');

            // Airtime
            Route::resource('/showtime', 'ShowtimeController');

            // Branch
            Route::resource('/branch', 'BranchController');

            // Movie
            Route::resource('/movies','MovieController');
            
            // Orders
            Route::resource('/order','OrderController');
            Route::get('/order/confirm/{id}','OrderController@approve')->name('order.approve');
            
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