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

//Rutas públicas para iniciar sesión o cerrar sesión
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Middleware que verifica si hay una sesión activa
Route::middleware('auth')->group(function () {
    //Middleware que verifica si el usuario en sesión posee el rol de admin o de official
    Route::middleware('roles')->group(function () {

        //Rutas home page
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/home', 'HomeController@index')->name('home');

        //Middleware que verifica si un usuario posee el rol de admin
        Route::middleware('can:admin')->group(function () {
            //Rutas crud users
            Route::prefix('users')->group(function () {
                Route::get('', 'UserController@index')->name('users.index');
                Route::get('/edit/{user}', 'UserController@edit')->name('users.edit');
                Route::put('/{user}', 'UserController@update')->name('users.update');
                Route::get('/create', 'UserController@create')->name('users.create');
                Route::post('', 'UserController@store')->name('users.store');
                Route::post('search', 'UserController@search');
                Route::delete('{user}', 'UserController@destroy')->name('users.destroy');
            });
        });

        //Rutas forms
        Route::prefix('forms')->group(function () {
            Route::get('', 'FormController@index')->name('forms.index');
            Route::get('create', 'FormController@create');
            Route::post('', 'FormController@store')->name('forms.store');
            Route::get('/edit/{form}', 'FormController@edit');
            Route::put('/{form}', 'FormController@update')->name('forms.update');
            Route::delete('{form}', 'FormController@destroy');
            Route::post('search', 'FormController@search');
            Route::get('/list/{form}', 'FormController@showList');
            Route::get('/getUsersForm/{form}', 'FormController@getUsersForm');
            Route::get('/pdf/{form}', 'FormController@PDF');
            Route::put('/switchActive/{form}', 'FormController@switchActive');
        });
    });
});

//Middleware que verifica si el formulario está activo
Route::middleware('ActiveForm')->group(function () {
    //Rutas públicas para registro de asistencia
    Route::get('forms/{form}', 'FormController@show');
    Route::post('forms/addUserToForm/{form}', 'FormController@addUserToForm');
});

//Ruta para adquirir los datos de un usuario por medio del email
Route::get('users/getUser/{email}', 'UserController@getUser');
