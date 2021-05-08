<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware('auth')->group(function () {

    //Rutas home page
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    //Rutas crud users
    Route::middleware('can:admin')->group(function (){
        Route::prefix('users')->group(function () {
            Route::get('', 'UserController@index')->middleware('roles');
            Route::get('/edit/{user}', 'UserController@edit');
            Route::put('/{user}', 'UserController@update');
            Route::get('/create', 'UserController@create');
            Route::post('', 'UserController@store');
            Route::post('search', 'UserController@search');
            Route::delete('{user}','UserController@destroy');
        });
    });
    Route::get('forms', 'FormController@index');
    //Rutas forms
    Route::middleware('roles')->group(function (){
        Route::prefix('forms')->group(function () {
            
        });
    });

});