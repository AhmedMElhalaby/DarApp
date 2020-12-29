<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login','AuthController@login');
    Route::post('signup','AuthController@register');
    Route::post('social_login','AuthController@social_login');
    Route::post('forget_password','AuthController@forget_password');
    Route::post('send_forget_password','AuthController@send_forget_password');
    Route::post('reset_password','AuthController@reset_password');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('me','AuthController@show');
        Route::post('refresh','AuthController@refresh');
        Route::post('update','AuthController@update');
        Route::get('resend_verify', 'AuthController@resend_verify');
        Route::post('verify', 'AuthController@verify');
        Route::post('change_password','AuthController@change_password');
        Route::post('logout','AuthController@logout');
    });
});
Route::group([
    'middleware' => 'auth:api'
], function() {
    Route::group([
        'prefix' => 'notifications',
    ], function() {
        Route::get('/', 'NotificationController@index');
        Route::post('send', 'NotificationController@send');
        Route::post('read', 'NotificationController@read');
        Route::post('read/all', 'NotificationController@read_all');
    });


    Route::group([
        'prefix' => 'tickets',
    ], function() {
        Route::get('/','TicketController@index');
        Route::get('show','TicketController@show');
        Route::post('store','TicketController@store');
        Route::post('response','TicketController@response');
    });


});
Route::group([
    'prefix' => 'home',
], function() {
    Route::get('faqs','HomeController@faqs');
    Route::get('install','HomeController@install');
});
Route::group([
    'prefix' => 'estates',
], function() {
    Route::get('/','EstateController@index');
    Route::get('show','EstateController@show');
    Route::get('get_offers','EstateController@get_offers');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::post('store','EstateController@store');
        Route::post('update','EstateController@update');
        Route::get('saved_searches','EstateController@saved_searches');
        Route::post('set_offer','EstateController@set_offer');
        Route::get('my_offers','EstateController@my_offers');
        Route::get('recent_views','EstateController@recent_views');
        Route::post('saved_searches/delete','EstateController@destroy_saved_searches');
        Route::get('favourites','EstateController@favourites');
        Route::post('favourites/toggle','EstateController@favourite_toggle');
        Route::post('media/delete','EstateController@delete_media');
    });
});
