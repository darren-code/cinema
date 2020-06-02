<?php

use App\Http\Controllers\TicketController;
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
    Route::fallback(function () {
        return abort(404);
    });

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

        Route::get('/search', [
            'uses' => 'MovieController@browse',
            'as' => 'search',
        ]);

        Route::get('/browse', [
            'uses' => 'MovieController@browse_movies',
            'as' => 'browse',
        ]);

        Route::get('/now', [
            'uses' => 'MovieController@now_showing',
            'as' => 'now.showing',
        ]);

        Route::get('/soon', [
            'uses' => 'MovieController@coming_soon',
            'as' => 'coming.soon',
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

        Route::post('/movie/{branch}/{id}/{time}', [
            'uses' => 'MovieController@checkout',
            'as' => 'movie.checkout'
        ]);

        Route::get('/profile/edit/{id}', [
            'uses' => 'UserController@edit',
            'as' => 'user.edit'
        ]);

        Route::post('comment/{user}/{movie}', [
            'uses' => 'MovieController@comment',
            'as' => 'user.review'
        ]);

        Route::post('/updateprofile', [
            'uses' => 'UserController@update',
            'as' => 'profile.update'
        ]);

        Route::get('/profile/{id}', [
            'uses' => 'UserController@profile',
            'as' => 'profile'
        ]);
    
        Route::get('/account/{filename}', [
            'uses' => 'UserController@profile_picture',
            'as' => 'user.profile'
        ]);

        Route::get('/poster/{filename}', [
            'uses' => 'MovieController@poster',
            'as' => 'movie.poster'
        ]);

        Route::post('/book', [
            'uses' => 'TicketController@purchase',
            'as' => 'user.book'
        ]);

        Route::get('/signout', [
            'uses' => 'UserController@logout',
            'as' => 'signout',
        ]);

    });


    Route::get('/login', function () {
        return view('login');
    })->name('login');

    
    Route::get('/register', function () {
        return view('register');
    })->name('register');

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
            Route::get('/gender', 'DashboardController@gender');
            Route::get('/date', 'DashboardController@date');
            Route::get('/consent', 'DashboardController@consent');
            Route::get('/transaction', 'DashboardController@transaction');
            Route::get('/method', 'DashboardController@method');

            // Showtime
            Route::resource('/playing','PlayingController');

            // Studio
            Route::resource('/studio','StudioController');
            Route::get('/studio/seat/{id}/{time}','StudioController@seat')->name('studio.seat');

            // Airtime
            Route::resource('/showtime', 'ShowtimeController');

            // Branch
            Route::resource('/branch', 'BranchController');

            // Movie
            Route::resource('/movies','MovieController');
            
            // Genre Relation 
            Route::resource('/genrerelation','GenreRelationController');

            // Genre 
            Route::resource('/genre','GenreController');

            // Cast Relation 
            Route::resource('/castrelation','CastRelationController');

            // Cast 
            Route::resource('/cast','CastController');

            // Orders
            Route::resource('/order','OrderController');
            Route::get('/order/confirm/{id}','OrderController@confirm')->name('order.confirm');
            Route::get('/order/pending/{id}','OrderController@pending')->name('order.pending');

            // Tickets
            Route::resource('/ticket','TicketController');

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