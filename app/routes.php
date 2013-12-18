<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('users', function() {
        return View::make('users');
});

Route::get('index', function() {
	return View::make('index');
});

Route::get('promotion', 'PromotionController@showPromotionAndCouponTable');

Route::post('promotion/insertCoupon', 'PromotionController@insertCoupon');
Route::post('promotion/deletePromotionOrCoupon', 'PromotionController@deletePromotionOrCoupon');
