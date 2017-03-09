<?php
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {
	Route::get('purchase', 'HomeController@purchase')->name('purchase');
	Route::get('purchase/{user_id}/{deck_id}', 'HomeController@purchase_deck')->name('purchase/{user_id}/{deck_id}');
	Route::post('purchased/{user_id}/{deck_id}', 'HomeController@purchased_deck')->name('purchased/{user_id}/{deck_id}');
    Route::post('create_deck_card', 'HomeController@create_deck_card')->name('create_deck_card');
    Route::get('show_deck_card/{user_id}/{deck_id}', 'HomeController@show_deck_card')->name('show_deck_card/{user_id}/{deck_id}');

});

Route::group(['middleware' => ['auth', 'admin']], function () {
    //
    Route::get('dashboard', 'AdminController@index')->name('dashboard');

    Route::get('deck', 'AdminController@deck')->name('deck');
    Route::post('add_deck', 'AdminController@add_deck')->name('add_deck');
    Route::post('update_deck/{deck_id}', 'AdminController@update_deck')->name('update_deck');
    Route::post('delete_deck/{deck_id}', 'AdminController@delete_deck')->name('delete_deck');

    Route::get('card', 'AdminController@card')->name('card');
    Route::post('add_card', 'AdminController@add_card')->name('add_card');
    Route::post('update_card/{card_id}', 'AdminController@update_card')->name('update_card');
    Route::post('delete_card/{card_id}', 'AdminController@delete_card')->name('delete_card');

	
});

