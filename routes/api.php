<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(['middleware' => ['api']], function () {

    Route::post('login', [
        'uses' => 'AuthController@login',
        'as'   => 'login',
    ]);

    Route::post('register', [
        'uses' => 'AuthController@register',
        'as'   => 'register',
    ]);

    Route::group(['prefix' => 'note'], function () {
        Route::get('my', [
            'uses' => 'NoteController@my',
            'as'   => 'my',
        ]);
    });

    Route::resource('note', 'NoteController');
});
