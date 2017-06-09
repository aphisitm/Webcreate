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

//Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




//Main Login
Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@postForm');
Route::get('logout', 'LoginController@logout');

Route::get('register', 'RegisterController@index');
Route::resource('register', 'RegisterController');


Route::group(['prefix' => 'brand'], function () {

Route::get('home', 'BrandConroller@index')->name('home');


Route::resource('myprofile', 'ProfileController');


Route::get('mycampaign', 'CampaignConroller@myCampaign');
Route::resource('campaignitems','CampaignConroller');

});

Route::group(['prefix' => 'creator'], function () {

//Route::get('home', 'BrandConroller@index')->name('home');

});





