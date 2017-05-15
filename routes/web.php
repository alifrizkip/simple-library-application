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

/*Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/', ['uses' => 'ListController@index', 'as' => 'list.index']);

/*
 * Route untuk Admin
 */
Route::group(['middleware' => 'role', 'auth'], function() {

	Route::resource('/genre', 'GenreController');
	Route::resource('/book', 'BookController');

	Route::get('/user', ['uses' => 'UserController@index', 'as' => 'user.index']);
});

/*
 * Route untuk member biasa
 */
Route::group(['middleware' => 'auth'], function() {	
	Route::get('/home', 'HomeController@index');
	// Route::get('/', ['uses' => 'ListController@index', 'as' => 'list.index']);
	Route::post('/', ['uses' => 'ListController@borrow', 'as' => 'list.borrow']);
	Route::delete('/', ['uses' => 'ListController@returnBack', 'as' => 'list.returnBack']);
	Route::get('/send/{id}', ['uses' => 'ListController@send', 'as' => 'list.send']);
	Route::post('/send', ['uses' => 'ListController@sending', 'as' => 'list.sending']);
});

Auth::routes();