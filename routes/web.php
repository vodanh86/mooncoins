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

Route::get('api/promotedCoins', 'ApiController@getPromotedCoins');
Route::get('api/bestCoins', 'ApiController@getBestCoins');
Route::get('api/todayCoins', 'ApiController@getTodayCoins');
Route::get('api/yourCoins', 'ApiController@getYourCoins');
Route::get('api/updateVote', 'ApiController@updateVote');
Route::get('api/getComments', 'ApiController@getComments');
Route::get('api/addComment', 'ApiController@addComment');
Route::get('coin/{id}', 'PageController@viewCoin');

Route::post('coin', [
    'uses' => 'HomeController@storeCoin',
    'as' => 'coin.store'
]);
