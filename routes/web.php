<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/**
 * Rutas para la autenticación.
 */
Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false
]);

Route::middleware('auth')->group(function () {
    Route::middleware('roles')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::middleware('can:admin')->group(function () {
            /**
             * Rutas para el mantenimiento de Usuarios.
             */
            Route::resource('users', 'UserController')->except(['show', 'update']);
            Route::post('users/search', 'UserController@search')->name('users.search');
            Route::put('users/switchActive/{user}', 'UserController@switchActive')->name('users.activate');
        });

        /**
         * Rutas para actualizar un usuario y para redirigir a la vista profile
         */
        Route::get('users/profile', 'UserController@profile')->name('users.profile');
        Route::put('users/profile/{user}', 'UserController@update')->name('users.profile.update');
        Route::put('users/{user}', 'UserController@update')->name('users.update');

        /**
         * Rutas para el mantenimiento de Formularios.
         */
        Route::resource('forms', 'FormController')->except(['show']);
        Route::prefix('forms')->group(function () {
            Route::post('search', 'FormController@search')->name('forms.search');
            Route::get('/list/{form}', 'FormController@showList')->name('forms.list');
            Route::get('/getUsersForm/{form}', 'FormController@getUsersForm');
            Route::get('/pdf/{form}', 'FormController@PDF')->name('forms.pdf');
            Route::put('/switchActive/{form}', 'FormController@switchActive')->name('forms.activate');
        });
    });
});

Route::middleware('ActiveForm')->group(function () {
    Route::get('forms/{uuid}', 'FormController@show')->name('forms.show');

    Route::post('forms/addUserToForm/{uuid}', 'FormController@addUserToForm')->name('forms.subscribe');
});

Route::get('users/getUser/{email}', 'UserController@getUser')->name('users.getUser');
