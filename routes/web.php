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

            Route::resource('users', 'UserController')->except(['show']);
            Route::get('users/search', 'UserController@search')->name('users.search');
            Route::put('users/switchActive/{user}', 'UserController@switchActive')->name('users.activate');
        });

        Route::get('profile', 'UserController@profile')->name('users.profile');
        Route::put('profile/{user}', 'UserController@update')->name('users.profile.update');

        Route::resource('forms', 'FormController')->except(['show']);
        Route::prefix('forms')->group(function () {

            Route::get('search', 'FormController@search')->name('forms.search');

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
Route::get('users/getPositionsAndCareers', 'UserController@getPositionsAndCareers')->name('users.getPositionsAndCareers');
