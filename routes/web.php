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

Route::get('wintercup2021', 'WinterCupController@index')->name('home');
Route::get('stage-pick', 'PickersController@stage');
Route::get('player-pick', 'PickersController@player');
Route::get('stage-player-pick', 'PickersController@stageAndPlayer');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect', 
        'localizationRedirect', 
        'localeViewPath',
    ],
], function() { 

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('about', 'HomeController@about')->name('about');

    Route::prefix('wiki')->as('wiki.')->group(function () {
        Route::get('/', 'WikiController@index')->name('index');
        Route::get('{slug}', 'WikiController@show')->name('show');
    });

    Route::prefix('posts')->as('posts.')->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('list', 'PostController@list')->name('list');
            Route::get('{id}/edit', 'PostController@edit')->name('edit');
            Route::get('{id}/preview', 'PostController@preview')->name('preview');
            Route::get('create', 'PostController@create')->name('create');
            Route::get('{id}/delete', 'PostController@delete')->name('delete');
            Route::post('{id}/update', 'PostController@update')->name('update');
            Route::post('{id}/thumbnail', 'PostController@thumbnail')->name('thumbnail');
            Route::post('/markdown', 'PostController@markdown')->name('markdown');
        });
        Route::get('/', 'PostController@index')->name('index');
        Route::get('{hook}', 'PostController@show')->name('show');
    });

    Route::prefix('auth')->as('auth.')->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('login', 'AuthenticateController@login')->name('login');
            Route::post('attempt', 'AuthenticateController@attempt')->name('attempt');
        });
        Route::middleware('auth')->group(function () {
            Route::get('logout', 'AuthenticateController@logout')->name('logout');
        });
    });
});
