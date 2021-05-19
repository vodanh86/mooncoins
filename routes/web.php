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

Route::get('/home', 'PageController@index')->name('home');
Route::get('/promote', 'PageController@promote');
Route::get('/addCoin', 'HomeController@addCoin');
Route::get('/newsletter', 'PageController@newsletter');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('api/promotedCoins', 'apiController@getPromotedCoins');
Route::get('api/bestCoins', 'apiController@getBestCoins');
Route::get('api/todayCoins', 'apiController@getTodayCoins');
Route::get('api/yourCoins', 'apiController@getYourCoins');
Route::get('api/updateVote', 'apiController@updateVote');
Route::get('api/getComments', 'apiController@getComments');
Route::get('api/addComment', 'apiController@addComment');
Route::get('coin/{id}', 'PageController@viewCoin');

Route::post('coin', [
    'uses' => 'HomeController@storeCoin',
    'as' => 'coin.store'
]);
