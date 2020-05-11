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
    
    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::get('/home', function () {
        return view('home');
    })->name('home')->middleware('auth');

    Route::post('/signup', [
        'uses' => 'UserController@register', // Controller @ Function
        'as' => 'signup', // Identified As
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@login',
        'as' => 'signin',
    ]);
});