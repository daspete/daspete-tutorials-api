<?php

use Illuminate\Http\Request;

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

Route::prefix('auth')->middleware(['api'])->group(function(){
    Route::post('login', 'AuthController@login')->name('auth.login');
    Route::post('logout', 'AuthController@logout')->name('auth.logout');
    Route::get('refresh', 'AuthController@refresh')->name('auth.refresh');
    Route::get('me', 'AuthController@me')->name('auth.me');
});

Route::get('topmenu', function(){
    return response()->json(array(
        [
            'name' => 'HOME',
            'slug' => '/'
        ],
        [
            'name' => 'ABOUT',
            'slug' => 'about'
        ]
    ));
});

Route::get('meta', function(){
    return response()->json(array(
        'title' => 'hello there',
        'meta' => array(
            [
                'name' => 'description',
                'content' => 'meta description'
            ]
        )
    ));
});

Route::prefix('tutorials')->group(function(){
    Route::get('/', 'TutorialController@index')->name('tutorials');
    Route::get('premium', 'TutorialController@premium')->name('tutorials.premium');
});
